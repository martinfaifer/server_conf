<?php

namespace App\Repository\Server;

use App\Models\ServerLogin;

class ServerLoginRepository
{

    public function store(object $formData)
    {
        return ServerLogin::create([
            'username' => $formData->username,
            'password' => $formData->password
        ]);
    }

    public function update(int $serverLoginId, object $formData)
    {
        $serverLogin = ServerLogin::find($serverLoginId);
        $serverLogin->update([
            'username' => $formData->username,
            'password' => $formData->password
        ]);
    }
}
