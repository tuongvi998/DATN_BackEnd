<?php

use Illuminate\Database\Seeder;

class Position extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\RegisterPosition::class, 42)->create();
    }
}
