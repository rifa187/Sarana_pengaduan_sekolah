<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display admin dashboard with statistics.
     */
    public function index()
    {
        $totalComplaints = Complaint::count();
        $pendingComplaints = Complaint::where('status', 'menunggu')->count();
        $processComplaints = Complaint::where('status', 'diproses')->count();
        $finishedComplaints = Complaint::where('status', 'selesai')->count();

        // Recent complaints
        $recentComplaints = Complaint::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalComplaints',
            'pendingComplaints',
            'processComplaints',
            'finishedComplaints',
            'recentComplaints'
        ));
    }

    /**
     * Display a listing of all complaints.
     */
    public function complaints(Request $request)
    {
        $query = Complaint::query();

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $complaints = $query->latest()->paginate(10);

        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Display the specified complaint for admin.
     */
    public function showComplaint(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    /**
     * Update complaint status.
     */
    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate(['status' => 'required|in:menunggu,diproses,selesai,ditolak']);

        $complaint->update(['status' => $request->status]);

        return back()->with('success', 'Status pengaduan diperbarui.');
    }

    /**
     * Import Data Siswa from Excel/CSV
     */
    public function importStudents(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ], [
            'file.required' => 'Mohon pilih file CSV atau Excel terlebih dahulu.',
            'file.mimes' => 'Format file harus berupa Excel (.log, .xls) atau CSV (.csv).',
            'file.max' => 'Ukuran file terlalu besar (Maks. 2MB).'
        ]);

        try {
            $import = new StudentsImport();
            Excel::import($import, $request->file('file'));
            
            $count = $import->getImportedCount();
            
            if ($count > 0) {
                return back()->with('success', "Berhasil! $count data siswa baru telah tersimpan di sistem.");
            } else {
                return back()->with('success', "Selesai memproses file. Tidak ada siswa baru yang ditambahkan (mungkin data sudah ada).");
            }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return back()->with('error', 'Gagal memproses file. Terdapat kesalahan format pada baris ke-' . $failures[0]->row());
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan sistem saat membaca file: ' . $e->getMessage());
        }
    }

    /**
     * Daftar seluruh siswa
     */
    public function students(Request $request)
    {
        $query = User::where('role', 'student');

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%$q%")
                    ->orWhere('nis', 'like', "%$q%")
                    ->orWhere('kelas', 'like', "%$q%")
                    ->orWhere('email', 'like', "%$q%");
            });
        }

        $students = $query->latest()->paginate(10)->withQueryString();

        return view('admin.students.index', compact('students'));
    }

    /**
     * Form tambah siswa baru
     */
    public function createStudent()
    {
        return view('admin.students.create');
    }

    /**
     * Simpan siswa baru
     */
    public function storeStudent(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nis'      => 'nullable|string|max:20|unique:users,nis',
            'kelas'    => 'nullable|string|max:50',
            'jurusan'  => 'nullable|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required'      => 'Nama lengkap wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'nis.unique'         => 'NIS sudah terdaftar.',
            'password.required'  => 'Password wajib diisi.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'     => $request->name,
            'nis'      => $request->nis,
            'kelas'    => $request->kelas,
            'jurusan'  => $request->jurusan,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'password' => Hash::make($request->password),
            'role'     => 'student',
        ]);

        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    /**
     * Form edit siswa
     */
    public function editStudent(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    /**
     * Update data siswa
     */
    public function updateStudent(Request $request, User $student)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'nis'     => 'nullable|string|max:20|unique:users,nis,' . $student->id,
            'kelas'   => 'nullable|string|max:50',
            'jurusan' => 'nullable|string|max:100',
            'email'   => 'required|email|unique:users,email,' . $student->id,
            'no_hp'   => 'nullable|string|max:20',
            'password'=> 'nullable|string|min:6|confirmed',
        ], [
            'name.required'  => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique'   => 'Email sudah terdaftar.',
            'nis.unique'     => 'NIS sudah terdaftar.',
            'password.min'   => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $data = [
            'name'    => $request->name,
            'nis'     => $request->nis,
            'kelas'   => $request->kelas,
            'jurusan' => $request->jurusan,
            'email'   => $request->email,
            'no_hp'   => $request->no_hp,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $student->update($data);

        return redirect()->route('admin.students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Hapus siswa
     */
    public function destroyStudent(User $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil dihapus.');
    }
}
