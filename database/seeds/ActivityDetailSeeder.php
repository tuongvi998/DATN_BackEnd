<?php

use Illuminate\Database\Seeder;

class ActivityDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ActivityDetail::class,100)->create();
    }
}
