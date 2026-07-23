<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => '5oLJ7@example.com',
            'phone' => '1234567890',
            'salary' => 50000
        ]);
        Employee::create([
            'name' => 'Joh',
            'email' => '5o@example.com',
            'phone' => '2234567890',
            'salary' => 50000
        ]);
        Employee::create([
            'name' => 'Raju',
            'email' => '5oraju7@example.com',
            'phone' => '1235567890',
            'salary' => 1000
        ]);
    }
}
