<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetPhpVersionAction extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("php -v");

        return $this->output($output);
    }
}
