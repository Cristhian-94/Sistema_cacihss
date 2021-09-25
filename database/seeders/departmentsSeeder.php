<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           DB::table('departments')->truncate();
            DB::table('departments')->insert([
            'name'=>'Informatica'
            ]);
    }
}
