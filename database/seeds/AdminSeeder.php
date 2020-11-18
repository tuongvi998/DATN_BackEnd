<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::all()->where('role_id','=','1');
        $count = $admin->count();
        factory(\App\Admin::class,$count)->create();
    }
}
