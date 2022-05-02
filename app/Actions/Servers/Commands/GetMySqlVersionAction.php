<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetMySqlVersionAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if($connection == false) {
            return false;
        }
        $output = $connection->exec("mysql -V");

        return $this->output($output);
    }
}
