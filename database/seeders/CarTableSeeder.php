<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'car')->insert([
            'store_id'=>'1',
            'model'=>'DRG',
            'riding_noise'=>'50',
            'idle_noise'=>'20',
            'max_power'=>'15',
            'max_rpm'=>'15000',
            'displacement'=>'150',
        ]);
        

    }
}
