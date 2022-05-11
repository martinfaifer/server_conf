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
}
