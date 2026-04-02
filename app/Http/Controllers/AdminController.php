<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

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
}
