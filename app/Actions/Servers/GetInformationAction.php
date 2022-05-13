<?php

namespace App\Actions\Servers;

use App\Models\Server;
use App\Jobs\GetServerInformationJob;
use App\Actions\Servers\Commands\GetCpuInfoAction;
use App\Actions\Servers\Commands\GetWebServerAction;
use App\Actions\Servers\Commands\GetMemcachedVersion;
use App\Actions\Servers\Commands\GetPhpVersionAction;
use App\Actions\Servers\Commands\GetSumCpuCoreAction;
use App\Actions\Servers\Commands\GetNodeVersionAction;
use App\Actions\Servers\Commands\GetHardwareInfoAction;
use App\Actions\Servers\Commands\GetHddFreeSpaceAction;
use App\Actions\Servers\Commands\GetMySqlVersionAction;
use App\Actions\Servers\Commands\GetRedisVersionAction;
use App\Actions\Servers\Commands\GetHddTotalSpaceAction;
use App\Actions\Servers\Commands\GetPythonVersionAction;
use App\Actions\Servers\Commands\GetMongoDBVersionAction;
use App\Actions\Servers\Commands\GetRamInformationAction;
use App\Actions\Servers\Commands\GetOperationSystemVersionAction;

class GetInformationAction
{
    public function handle()
    {
        $servers = Server::get();
        foreach ($servers as $server) {
            dispatch(new GetServerInformationJob($server));
        }
    }

    public function get_information($server): array
    {
        $connection = (new ConnectionAction())->handle($server);
        if ($connection == false) {
            return [];
        }

        return [
            'hardware' => [
                'ram' => (new GetRamInformationAction())->handle($connection),
                'sumCpuCores' => (new GetSumCpuCoreAction())->handle($connection),
                'cpuInformation' => (new GetCpuInfoAction())->handle($connection),
                'hardwareInformation' => (new GetHardwareInfoAction())->handle($connection),
                'hdd' => [
                    'total' => (new GetHddTotalSpaceAction())->handle($connection),
                    'free' => (new GetHddFreeSpaceAction())->handle($connection),
                ]
            ],
            'database' => [
                'mongoDb' => (new GetMongoDBVersionAction())->handle($connection),
                'mysql' => (new GetMySqlVersionAction())->handle($connection),
                'redis' => (new GetRedisVersionAction())->handle($connection),
                'memcached' => (new GetMemcachedVersion())->handle($connection),
            ],
            'web_server' => [
                'webserver' => (new GetWebServerAction())->handle($connection)
            ],
            'eviroments' => [
                'php' => (new GetPhpVersionAction())->handle($connection),
                'nodejs' => (new GetNodeVersionAction())->handle($connection),
                'python3' => (new GetPythonVersionAction())->handle($connection)
            ],
            'system' => [
                'kernel' => (new GetOperationSystemVersionAction())->handle($connection)
            ],
        ];
    }
}
