<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogFilePath extends Model
{
    protected $fillable = [
        'server_id', 'path', 'description', 'act_as_superuser'
    ];

    protected $casts = [
        'act_as_superuser' => 'boolean',
    ];
}
