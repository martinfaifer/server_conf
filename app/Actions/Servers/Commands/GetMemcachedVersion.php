<?php

namespace App\Actions\Servers\Commands;

use App\Services\SSH\SshConnectService;

class GetMemcachedVersion extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("memcached --version");

        return $this->output($output);
    }
}
