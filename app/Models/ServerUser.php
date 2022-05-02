<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerUser extends Model
{
    protected $fillable = [
        'user_id', 'server_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function server()
    {
        return $this->belongsTo(Server::class, 'server_id', 'id');
    }
}
