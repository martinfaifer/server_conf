<?php
namespace App\Actions\Servers\Commands;

class CommandOutputAction
{
    public function output(string $outputConsoleData): array
    {
        if(str_contains($outputConsoleData, 'bash')) {
            return [];
        }

        return explode("\n", $outputConsoleData);
    }
}
