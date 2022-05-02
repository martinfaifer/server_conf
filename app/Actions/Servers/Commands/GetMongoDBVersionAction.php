<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetMongoDBVersionAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("mongod --version");
        return $this->output($output);
    }
}
