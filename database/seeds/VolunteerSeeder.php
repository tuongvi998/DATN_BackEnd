<?php

use Illuminate\Database\Seeder;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::all()->where('role_id','=','3');
        $count = $admin->count();
        factory(\App\Volunteer::class,$count)->create();
    }
}
