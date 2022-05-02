<?php

namespace App\Actions\Servers\Commands;

class GetWebServerAction extends CommandOutputAction
{
    public function handle($connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("nginx -v");

        if(str_contains($output, 'not found')) {
            $output = $connection->exec("apache2 -v");
        }
        return $this->output($output);
    }
}
