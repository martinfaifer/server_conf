<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $user = User::where('email', "admin@admin.cz")->first();
        $this->actingAs($user);

        $response = $this->get('servers');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        //
    }

    public function test_store()
    {
        $user = User::where('email', "admin@admin.cz")->first();
        $this->actingAs($user);

        $response = $this->post('servers', [
            'ip_address' => "0.0.0.0",
            'server_name' => "test server",
            'username' => "admin",
            'password' => "admin"

        ]);

        $response->assertStatus(200);
    }
}
