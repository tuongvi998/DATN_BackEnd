<?php

use Illuminate\Database\Seeder;

class RegisterProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\RegisterProfile::class,8000)->create();
    }
}
