<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Actions\Servers\GetInformationAction;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Repository\Server\ServerConfigDataRespository;

class GetServerInformationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $server;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $server)
    {
        $this->server = $server;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new ServerConfigDataRespository())->store($this->server, (new GetInformationAction())->get_information($this->server));
    }
}
