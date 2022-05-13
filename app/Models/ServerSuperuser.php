<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerSuperuser extends Model
{
    protected $fillable = [
        'server_id', 'root_password'
    ];
}
