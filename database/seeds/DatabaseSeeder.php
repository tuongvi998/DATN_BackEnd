<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FieldSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(VolunteerSeeder::class);
        $this->call(ActivityDetailSeeder::class);
        $this->call(RegisterProfileSeeder::class);

    }
}
