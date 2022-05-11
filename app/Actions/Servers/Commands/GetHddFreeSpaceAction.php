<?php

namespace App\Actions\Servers\Commands;

class GetHddFreeSpaceAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("php -r 'print_r(disk_free_space(\"/\"));'");

        return $this->output($output);
    }
}
