<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Type::count() < 1) {
            Type::insert([
                ['type_name' => 'Type #1'],
                ['type_name' => 'Type #2'],
                ['type_name' => 'Type #3'],
                ['type_name' => 'Type #4'],
                ['type_name' => 'Type #5'],
            ]);
        }
    }
}
