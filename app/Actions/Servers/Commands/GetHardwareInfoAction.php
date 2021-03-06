<?php

namespace App\Actions\Servers\Commands;

class GetHardwareInfoAction extends CommandOutputAction
{
    public function handle(object $connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("lshw -short");

        return $this->output($output);
    }
}
