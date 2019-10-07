<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Company::count() < 1) {
            Company::insert([
                ['company_name' => 'Company #1'],
                ['company_name' => 'Company #2'],
                ['company_name' => 'Company #3'],
                ['company_name' => 'Company #4'],
                ['company_name' => 'Company #5'],
            ]);
        }
    }
}
