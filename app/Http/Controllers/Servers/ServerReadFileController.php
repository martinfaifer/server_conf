<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use App\Models\LogFilePath;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Servers\Commands\FileManipulation\ReadAnyFileAction;

class ServerReadFileController extends Controller
{
    public function __invoke(Server $server, LogFilePath $logFilePath)
    {
        $serverResponse = (new ReadAnyFileAction())->handle($server, $logFilePath->path, $logFilePath->act_as_superuser);
        if($serverResponse == false) {
            return $this->error_response("Přítup zamítnut");
        }
        return $serverResponse;
    }
}
