<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'abc@yopmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a12345678X'),
        ]);
    }
}
