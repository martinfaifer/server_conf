<?php

namespace App\Services\SSH;

use phpseclib3\Net\SSH2;

class SshConnectService
{
    public static function connect(string $ipAddress, string $username, string $password)
    {
        try {
            $ssh = new SSH2($ipAddress);
            if (!$ssh->login($username, $password)) {
                return false;
            }

            return $ssh;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
