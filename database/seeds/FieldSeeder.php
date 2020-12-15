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
        $field = ['Bảo vệ động vật', 'Cứu trợ thiên tai', 'Giáo dục', 'Cứu trợ nhân đạo', 'Giới tính', 'Môi trường và thiên nhiên',
            'Lĩnh vực phụ nữ', 'Lĩnh vực trẻ em', 'Y tế sức khỏe', 'Phát triển cộng đồng'];
        for($i=0; $i < count($field); $i++){
            \Illuminate\Support\Facades\DB::table('fields')
                ->insert([
                    'id' => $i+1,
                    'name' => $field[$i]
                ]);
        }
    }
}
