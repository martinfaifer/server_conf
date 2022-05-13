<?php

namespace App\Actions\Servers\Commands\FileManipulation;

use App\Actions\Servers\ConnectionAction;
use App\Actions\Servers\Commands\FileManipulation\Helper\StringReplaceHelperAction;

class WriteAnyContentToFile
{

    public function handle(object $server, string $path, $content, $needSuperUser = false)
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        $content = StringReplaceHelperAction::replace($content);

        if ($needSuperUser == false) {
            $connection->exec("php -r \"file_put_contents('{$path}', '{$content}');\"");
        }

        if ($needSuperUser == true) {
            $output = $connection->exec("echo {$server->superuser->root_password} | /usr/bin/sudo -S php -r \"file_put_contents('{$path}', '{$content}');\"");
        }
        if (str_contains($output, 'Permission denied')) {
            return false;
        }
        return true;
    }
}
