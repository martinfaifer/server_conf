<?php
namespace App\Repository\Server;

use App\Models\ServerDomain;

class ServerDomainRepository
{
    public function store(object $server, $formData)
    {
        ServerDomain::create([
            'server_id' => $server->id,
            'domain' => $formData->domain
        ]);
    }

    public function update(object $server, object $serverDomain, $formData)
    {
        $serverDomain->update([
            'domain' => $formData->domain
        ]);
    }
}
