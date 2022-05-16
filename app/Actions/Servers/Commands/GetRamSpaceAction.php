<?php

namespace App\Actions\Servers\Commands;

class GetRamSpaceAction extends CommandOutputAction
{

    /**
     * return array with keys 0 = total , 1 = used, 2 = free, 3 = shared , 4 = cached, 5 = available
     *
     * @param object $connection
     * @return void
     */
    public function handle(object $connection)
    {
        if ($connection == false) {
            return false;
        }
        $output = $connection->exec("free");
        $ramAndSwap = explode("\n", $output);
        $ramData = explode(" ", $ramAndSwap[1]);
        foreach($ramData as $ramStatus) {
            if(!empty($ramStatus)) {
                if(!str_contains($ramStatus, 'Mem')) {
                    $MemoryData[] = $ramStatus;
                }
            }
        }
        return $MemoryData;
    }
}
