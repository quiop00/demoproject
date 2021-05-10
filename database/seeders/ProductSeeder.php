<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name_product'=>'iPhone',
            ],
            [
                'name_product'=>'Samsung',
            ],
            [
                'name_product'=>'HTC',
            ],
            [
                'name_product'=>'Huawei',
            ],
            [
                'name_product'=>'Oppo',
            ],
        ];
        DB::table('products')->insert($data);
    }
}
