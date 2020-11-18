<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field = ['môi trường', 'Thiên tai', 'Giáo dục'];
        for($i=0; $i < count($field); $i++){
            \Illuminate\Support\Facades\DB::table('fields')
                ->insert([
                    'id' => $i+1,
                    'name' => $field[$i]
                ]);
        }
    }
}
