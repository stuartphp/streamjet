<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create();
        \App\Models\Company::factory()->create();
        DB::table('company_user')->insert([
            'company_id'=>1,
            'user_id'=>1
        ]);
        DB::table('roles')->insert([
            [
                'company_id'=>1,
                'name'=>'Super User',
                'permissions' => 'SU'
            ],
            [
                'company_id'=>1,
                'name'=>'Accounting',
                'permissions'=>'ADE,ADV,ADD,BSE,BSV,BSD,FYE,FYV,FYD,JGE,JGV,JGD,JTE,JTV,JTD,JE,JV,JD,PTCE,PTCV,PTCD,PTE,PTV,PTD,PTRCE,PTRCV,PTRCD'
            ]
        ]);
        DB::table('role_user')->insert([
            'role_id'=>1,
            'user_id'=>1
        ]);
    }
}
