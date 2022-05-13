<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Server\ServerRepository;
use App\Http\Requests\Servers\StoreServerRequest;
use App\Http\Requests\Servers\UpdateServerNameLoginAndIpRequest;

class ServerController extends Controller
{
    public function index(ServerRepository $serverRepository)
    {
        return $serverRepository->index();
    }

    public function show(Server $server, ServerRepository $serverRepository)
    {
        return $serverRepository->show($server);
    }

    public function store(StoreServerRequest $request, ServerRepository $serverRepository)
    {
        return $serverRepository->store($request) == true
            ? $this->success_response("Vytvořeno")
            : $this->error_response("Nepovedlo se založit");
    }

    public function update(UpdateServerNameLoginAndIpRequest $request, Server $server, ServerRepository $serverRepository)
    {
        return $serverRepository->update($server, $request) == true
            ? $this->success_response("Upraveno")
            : $this->error_response('Nepodařilo se upravit');
    }
}
