<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerLogin extends Model
{
    protected $fillable = [
        'username', 'password'
    ];

    // protected $hidden = [
    //     'password',
    // ];
}
