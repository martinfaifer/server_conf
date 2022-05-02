<?php

namespace App\Http\Controllers\Servers;

use App\Http\Controllers\Controller;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerConfigDataController extends Controller
{
    public function show(Server $server)
    {
        return $server->server_config_data;
    }
}
