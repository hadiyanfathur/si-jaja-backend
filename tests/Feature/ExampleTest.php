<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->actingAs(
            User::factory()->make()
        );
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
