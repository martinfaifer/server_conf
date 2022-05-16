<?php

namespace App\Actions\Servers\Commands\FileManipulation;

use App\Actions\Servers\ConnectionAction;

class ClearAnyFileAction
{
    public function handle(object $server, string $path, bool $needSuperUser = false)
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        if ($needSuperUser == false) {
            $output = $connection->exec("truncate -s  0 " . $path);
        }

        if ($needSuperUser == true) {
            $output = $connection->exec("echo {$server->superuser->root_password} | /usr/bin/sudo -S truncate -s  0 " . $path);
        }
        if (str_contains($output, 'Permission denied')) {
            return false;
        }
        return true;
    }
}
