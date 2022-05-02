<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetRamInformationAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if($connection == false) {
            return false;
        }
        $output = $connection->exec("grep MemTotal /proc/meminfo");

        return $this->output($output);
    }
}
