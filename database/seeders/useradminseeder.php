<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class useradminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department= DB::Select('SELECT id FROM departments WHERE name= ?',['Informatica']);
            

        DB::table('users')->insert([
            'name'=>'Administrador',
            'last_name'=>'Tickets',
            'department_id'=>$department[0]->id,
            'email'=>'ticketscacihss2021@gmail.com',
            'password'=> bcrypt('tickets_administrador'),
            'role'=>'Administrador',
            'status'=>'Active'

        ]);

    }
}
