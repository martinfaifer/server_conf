<?php

namespace App\Actions\Servers\Commands;

class GetHddTotalSpaceAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("php -r 'print_r(disk_total_space(\"/\"));'");

        return $this->output($output);
    }
}
