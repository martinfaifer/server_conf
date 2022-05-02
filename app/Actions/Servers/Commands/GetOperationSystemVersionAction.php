<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetOperationSystemVersionAction extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("lsb_release -a");

        return $this->output($output);
    }
}
