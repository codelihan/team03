<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class carSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('car')->insert([
            'store_id' => 3,
            'model' => 'JETSL',
            'riding_noise' => 73,
            'idle_noise' => 80,
            'max_power' => 9.5,
            'max_rpm' => 8000,
            'displacement' => 124.6,
        ]);
    }
}
