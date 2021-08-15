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

        // $response = $this->postJson('/oauth/token', [

        // ]);

        $user->dump();
    }

    // public function test_users_can_be_retrieved()
    // {
    //     Passport::actingAs(
    //         User::factory()->create(),
    //         ['']
    //     );

    //     $response = $this->get('/api/user');

    //     $response->assertStatus(200);
    // }
}
