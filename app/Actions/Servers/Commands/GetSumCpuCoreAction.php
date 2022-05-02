<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetSumCpuCoreAction extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("nproc");

        return $this->output($output);
    }
}
