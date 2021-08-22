<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'password' => Hash::make(env("ADMIN_PASSWORD")),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'level' => 0,
        ]);
    }
}
