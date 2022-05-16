<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use App\Models\LogFilePath;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Servers\StoreLogFilePathRequest;
use App\Repository\Server\ServerLogFilePathRepository;
use App\Http\Requests\Servers\UpdateLogFilePathRequest;

class LogFilePathController extends Controller
{
    public function store(StoreLogFilePathRequest $request, Server $server, ServerLogFilePathRepository $serverLogFilePathRepository)
    {
        $serverLogFilePathRepository->store($server, $request);
        return $this->success_response("Vytvořeno");
    }

    public function update(UpdateLogFilePathRequest $request, Server $server, LogFilePath $logFilePath, ServerLogFilePathRepository $serverLogFilePathRepository)
    {
        return $serverLogFilePathRepository->update($logFilePath, $request) == true
            ? $this->success_response('Upraveno')
            : $this->error_response('Nepodařilo se upravit');
    }
}
