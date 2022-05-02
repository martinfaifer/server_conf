<?php

namespace App\Actions\Servers\Commands\FileManipulation;

use App\Actions\Servers\ConnectionAction;

class ReadCronTabAction
{
    public function handle(object $server)
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        $output = $connection->exec("cat /etc/crontab");
        return explode("\n", $output);
    }
}
