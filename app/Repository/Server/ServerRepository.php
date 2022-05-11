<?php

namespace App\Repository\Server;

use App\Models\Server;
use App\Models\ServerUser;
use Illuminate\Support\Facades\Auth;
use App\Actions\Servers\GetInformationAction;
use App\Repository\Server\ServerConfigDataRespository;

class ServerRepository
{

    public $output = [];

    public function index(): object
    {
        $user = Auth::user();
        $serversBelongsToUser = ServerUser::where('user_id', $user->id)->get();

        if ($serversBelongsToUser->isEmpty()) {
            return (object) $this->output;
        }

        foreach ($serversBelongsToUser as $servers) {
            $this->output[] = $servers->server;
        }

        return (object) $this->output;
    }

    public function show(object $server)
    {
        return (object) [
            'id' => $server->id,
            'ip_address' => $server->ip_address,
            'server_name' => $server->server_name,
            'login' => $server->login,
            'domains' => $server->domains,
            'logfiles' => $server->logfiles
        ];
    }

    public function store(object $formData): bool
    {
        try {
            $serverLogin = (new ServerLoginRepository())->store($formData);
            $server = Server::create([
                'ip_address' => $formData->ip_address,
                'server_name' => is_null($formData->server_name) ?  $formData->ip_address : $formData->server_name,
                'server_login_id' => $serverLogin->id
            ]);

            (new ServerUsersRepository())->store(Auth::user(), $server->id);
            (new ServerConfigDataRespository())->store($server, (new GetInformationAction())->get_information($server));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
