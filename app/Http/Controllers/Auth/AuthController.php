<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\LoginAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function show()
    {
        abort(404);
    }

    public function login(LoginRequest $request, LoginAction $loginAction)
    {
        return $loginAction->handle($request) == true
            ? $this->success_response("Přhlášeno")
            : $this->error_response("Neplatné údaje");
    }
}
