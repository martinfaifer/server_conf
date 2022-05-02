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

}
