<?php

namespace App\Repository\Server;

use App\Models\ServerConfigData;

class ServerConfigDataRespository
{
    public function store(object $server, array $serverData): void
    {
        ServerConfigData::updateOrCreate(
            ['server_id' => $server->id],
            ['server_data' => $serverData]
        );
    }
}
