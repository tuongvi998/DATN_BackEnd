<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ['admin', 'group', 'volunteer'];
        for($i=0; $i < count($role); $i++){
            \Illuminate\Support\Facades\DB::table('roles')
                ->insert([
                    'id' => $i+1,
                    'name' => $role[$i]
                ]);
        }
    }
}
