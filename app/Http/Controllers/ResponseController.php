<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Services\ResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    /**
     * Store a newly created response in storage.
     */
    public function store(Request $request, Complaint $complaint)
    {
        $request->validate([
            'respon' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai,ditolak' // Allow status update with response
        ]);

        // Create Response
        $this->responseService->createResponse([
            'complaint_id' => $complaint->id,
            'admin_id' => Auth::id(),
            'respon' => $request->respon,
        ]);

        // Update Status
        $complaint->update(['status' => $request->status]);

        return back()->with('success', 'Tanggapan berhasil dikirim dan status diperbarui.');
    }
}
