<?php

namespace App\Repository\Server;

use App\Models\ServerSuperuser;

class ServerSuperUserRepository
{
    public function updateOrCreate(object $server, object $formdata)
    {
        ServerSuperuser::updateOrCreate(
            ['server_id' =>  $server->id],
            ['root_password' => $formdata->root_password]
        );
    }

    public function destroy(object $server)
    {
        ServerSuperuser::where('server_id', $server->id)->delete();
    }
}
