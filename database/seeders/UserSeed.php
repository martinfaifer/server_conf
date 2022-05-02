<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@admin.cz')->first()) {
            User::create([
                'name' => "admin",
                'email' => "admin@admin.cz",
                'password' => Hash::make('admin')
            ]);
        }
    }
}
