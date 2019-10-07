<?php

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Employee::count() < 1) {
            Employee::insert([
                ['first_name' => 'First #1', 'last_name' => 'Last #1', 'email' => 'email_1@example.com'],
                ['first_name' => 'First #2', 'last_name' => 'Last #2', 'email' => 'email_2@example.com'],
                ['first_name' => 'First #3', 'last_name' => 'Last #3', 'email' => 'email_3@example.com'],
            ]);
        }
    }
}
