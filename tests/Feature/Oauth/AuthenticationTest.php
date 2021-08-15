<?php

namespace Tests\Feature\Oauth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Client;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    public function test_users_can_authenticate()
    {
        $user = User::factory()->create();
        
        $client = Client::factory()->asPasswordClient()->create();

        $response = $this->postJson('/oauth/token', [
            'grant_type' => 'password',
            'username' => $user->email,
            'password' => 'password',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'scope' => '',
        ]);  

        $response->assertStatus(200);
    }

}
