<?php

namespace App\Actions\Servers;

use App\Services\SSH\SshConnectService;

class ConnectionAction
{
    public function handle(object $server)
    {
        return  SshConnectService::connect($server->ip_address, $server->login->username, $server->login->password);
    }
}
