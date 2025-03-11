<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'master admin',
            'email' => 'master_admin@yopmail.com',
            'password' => bcrypt('a12345678X'),
        ]);
    }
}
