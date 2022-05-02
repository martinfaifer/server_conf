<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerDomain extends Model
{
    protected $fillable = [
        'server_id', 'domain'
    ];
}
