<?php

namespace App\Actions\User;

use Illuminate\Support\Facades\Auth;

class ShowLoggedUserAction
{
    public function handle()
    {
        $user = Auth::user();
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar
        ];
    }
}
