<?php

namespace App\Http\Controllers\User;

use App\Actions\User\ShowLoggedUserAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoggedUserController extends Controller
{
    public function show(ShowLoggedUserAction $showLoggedUserAction)
    {
        return $showLoggedUserAction->handle();
    }
}
