<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use App\Models\LogFilePath;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Servers\Commands\FileManipulation\ClearAnyFileAction;

class ServerClearFileController extends Controller
{
    public function __invoke(Server $server, LogFilePath $logFilePath)
    {
        (new ClearAnyFileAction())->handle($server, $logFilePath->path);
        return $this->success_response("Obsah smazán");
    }
}
