<?php

namespace App\Repository\Server;

use App\Models\LogFilePath;

class ServerLogFilePathRepository
{
    public function store(object $server, $formData)
    {
        LogFilePath::create([
            'server_id' => $server->id,
            'path' => $formData->path,
            'description' => $formData->description
        ]);
    }

    public function update(object $logFilePath, object $formData): bool
    {
        try {
            $logFilePath->update([
                'path' => $formData->path,
                'description' => $formData->description,
                'act_as_superuser' => $formData->act_as_superuser
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
