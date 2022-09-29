<?php

namespace App\ApiHelper;

class ResponseHelper
{
    public function json(bool $success, string $message, array $data = []): array
    {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ];
    }
}
