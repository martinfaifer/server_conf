<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetPythonVersionAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if($connection == false) {
            return false;
        }
        $output =  $connection->exec("python3 --version");
        return $this->output($output);
    }
}
