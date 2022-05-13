<?php

namespace App\Http\Controllers\Servers;

use App\Models\Server;
use App\Models\ServerDomain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Server\ServerDomainRepository;
use App\Http\Requests\Servers\StoreServerDomainRequest;
use App\Http\Requests\Servers\UpdateServerDomainRequest;

class ServerDomainController extends Controller
{
    public function store(StoreServerDomainRequest $request, Server $server, ServerDomainRepository $serverDomainRepository)
    {
        $serverDomainRepository->store($server, $request);
        return $this->success_response("Přidáno");
    }

    public function update(UpdateServerDomainRequest $request, Server $server, ServerDomain $serverDomain, ServerDomainRepository $serverDomainRepository)
    {
        $serverDomainRepository->update($server, $serverDomain, $request);
        return $this->success_response("Upraveno");
    }

    public function destroy(Server $server, ServerDomain $serverDomain)
    {
        $serverDomain->delete();
        return $this->success_response("Odebráno");
    }
}
