<?php

namespace App\Actions\Servers\Commands\FileManipulation;

use App\Actions\Servers\ConnectionAction;

class ReadAnyFileAction
{
    public function handle(object $server, string $path, bool $needSuperUser = false)
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        if ($needSuperUser == true) {

            if(is_null($server->superuser)) {
                return false;
            }
            $output = $connection->exec("echo {$server->superuser->root_password} | /usr/bin/sudo -S cat " . $path);
        } else {

            $output = $connection->exec("cat " . $path);
        }
        if (str_contains($output, 'Permission denied')) {
            return false;
        }
        return explode("\n", $output);
    }
}
