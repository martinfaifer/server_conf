<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerConfigData extends Model
{
    protected $fillable = [
        'server_id', 'server_data'
    ];

    protected $casts = [
        'server_data' => 'array',
    ];
}
