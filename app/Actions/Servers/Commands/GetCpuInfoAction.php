<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetCpuInfoAction extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("cat /proc/cpuinfo");

        return $this->output($output);
    }
}
