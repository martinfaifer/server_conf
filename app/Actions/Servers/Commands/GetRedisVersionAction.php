<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetRedisVersionAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if($connection == false) {
            return false;
        }
        $output = $connection->exec("redis-server -v");
        return $this->output($output);
    }
}
