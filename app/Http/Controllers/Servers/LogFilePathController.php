<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Servers\StoreLogFilePathRequest;
use App\Repository\Server\ServerLogFilePathRepository;

class LogFilePathController extends Controller
{
    public function store(StoreLogFilePathRequest $request, Server $server, ServerLogFilePathRepository $serverLogFilePathRepository)
    {
        $serverLogFilePathRepository->store($server, $request);
        return $this->success_response("Vytvořeno");
    }
}
