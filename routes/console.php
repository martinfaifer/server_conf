<?php

use App\Models\Server;
use Illuminate\Support\Facades\Artisan;
use App\Actions\Servers\ConnectionAction;
use App\Actions\Servers\GetInformationAction;


Artisan::command('server:get_information', function () {
    (new GetInformationAction())->handle();
})->purpose("Get information from remote server and store data in database");

// Artisan::command("server:test_cron", function() {
//     $server = Server::first();
//     $connection = (new ConnectionAction())->handle($server);
//     if ($connection == false) {
//         return [];
//     }

//     $output = $connection->exec("cat /etc/crontab");
//     print_r($output);
// });
