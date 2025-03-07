<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Employ',
            'email' => 'employ@yopmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a12345678X'),
        ]);
    }
}
