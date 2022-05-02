<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'ip_address', 'server_name', 'server_login_id'
    ];

    protected $casts = [
        'ip_address' => 'string',
        'server_name' => 'string',
    ];

    public function login()
    {
        return $this->belongsTo(ServerLogin::class, 'server_login_id', 'id');
    }

    public function server_config_data()
    {
        return $this->hasOne(ServerConfigData::class, 'server_id', 'id');
    }

    public function domains()
    {
        return $this->hasMany(ServerDomain::class, 'server_id', 'id');
    }
}
