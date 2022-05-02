<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetNodeVersionAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if($connection == false) {
            return false;
        }
        $output =  $connection->exec("node -v");
        return $this->output($output);
    }
}
