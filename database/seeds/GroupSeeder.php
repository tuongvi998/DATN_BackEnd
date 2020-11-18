<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gr = \App\User::all()->where('role_id','=','2');
        $count = $gr->count();
        factory(\App\Group::class,$count)->create();
    }
}
