<?php

namespace App\Actions\Servers\Commands\FileManipulation;

use App\Actions\Servers\ConnectionAction;

class ReadAnyFileAction
{
    public function handle(object $server, string $path)
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        $output = $connection->exec("cat " . $path);
        return explode("\n", $output);
    }
}
