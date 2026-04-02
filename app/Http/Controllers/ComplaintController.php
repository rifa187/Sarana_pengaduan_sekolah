<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Services\ComplaintService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    protected $complaintService;

    public function __construct(ComplaintService $complaintService)
    {
        $this->complaintService = $complaintService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For Students: Show their own complaints
        $complaints = Complaint::where('user_id', Auth::id())->latest()->get();
        return view('student.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'bukti_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'menunggu';

        $this->complaintService->createComplaint($validated, $request->file('bukti_file'));

        return redirect()->route('complaints.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        $this->authorize('view', $complaint);
        return view('student.complaints.show', compact('complaint'));
    }
}
