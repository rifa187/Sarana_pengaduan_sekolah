<?php

namespace App\Services;

use App\Models\Complaint;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ComplaintService
{
    public function createComplaint(array $data, ?UploadedFile $file = null): Complaint
    {
        if ($file) {
            $path = $file->store('complaints', 'public');
            $data['bukti_file'] = $path;
        }

        return Complaint::create($data);
    }

    public function updateStatus(Complaint $complaint, string $status): bool
    {
        return $complaint->update(['status' => $status]);
    }
}
