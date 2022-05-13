<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Servers\WriteServerCrontabRequest;
use App\Actions\Servers\Commands\FileManipulation\ReadCronTabAction;
use App\Actions\Servers\Commands\FileManipulation\ClearAnyFileAction;
use App\Actions\Servers\Commands\FileManipulation\WriteAnyContentToFile;

class ServerCronTabController extends Controller
{
    public function show(Server $server, ReadCronTabAction $readCronTabAction)
    {
        return response($readCronTabAction->handle($server));
    }

    public function write(WriteServerCrontabRequest $request, Server $server)
    {
        // 1) smazat původní crontab
        if(is_null($server->superuser)) {
            return $this->error_response("Nejdříve nadefinujte heslo k Rootu");
        }
        $clear = (new ClearAnyFileAction())->handle($server, "/etc/crontab", true);
        if($clear == false) {
            return $this->error_response("Nepodařilo se upravit soubor");
        }
        // // 2) přepsat novýma datama z requestu
        (new WriteAnyContentToFile())->handle($server, "/etc/crontab", $request->fileContent, true);

        return $this->success_response("Upraveno");
    }
}
