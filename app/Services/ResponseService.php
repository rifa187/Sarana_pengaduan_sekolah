<?php

namespace App\Services;

use App\Models\Response;
use App\Models\Complaint;

class ResponseService
{
    public function createResponse(array $data): Response
    {
        $response = Response::create($data);

        // Update complaint status to 'diproses' or 'selesai' automatically if needed
        // For now, let's just create the response. The controller might handle status update manually or here.
        // Let's assume creating a response might move it to 'diproses' if not already.
        // But the requirement says "Mengubah status" and "Memberikan respon" as features. Let's keep them separate but related.

        return $response;
    }
}
