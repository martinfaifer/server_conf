<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Servers\Commands\FileManipulation\ReadCronTabAction;

class ServerCronTabController extends Controller
{
    public function show(Server $server, ReadCronTabAction $readCronTabAction)
    {
        return response($readCronTabAction->handle($server));
    }
}
