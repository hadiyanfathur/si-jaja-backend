<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => Hash::make(env("ADMIN_PASSWORD")),
            'level' => 0,
        ])->create();
    }
}
