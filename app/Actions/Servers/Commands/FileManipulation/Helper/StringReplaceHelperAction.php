<?php
namespace App\Actions\Servers\Commands\FileManipulation\Helper;

class StringReplaceHelperAction
{
    public static function replace($content)
    {
        return str_replace(["'", "`"], [" "," "], $content);
    }
}
