<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id= \App\Models\Employee::factory()->count(100)->create();
    }
}
