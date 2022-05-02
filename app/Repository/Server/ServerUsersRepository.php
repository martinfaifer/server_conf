<?php
namespace App\Repository\Server;

use App\Models\ServerUser;

class ServerUsersRepository
{
    public function store(object $user, int $severId)
    {
        ServerUser::create([
            'user_id' => $user->id,
            'server_id' => $severId
        ]);
    }
}
