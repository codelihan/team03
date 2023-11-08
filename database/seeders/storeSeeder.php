<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class storeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store')->insert([
            'id' => 1,
            'name' => 'YAMAHA',
            'country' => '日本',
            'service' => '463',
            'info' => 'YAMAHA是一家著名的日本機車製造商，以其創新的設計和高性能機車而聞名。',
            'url' => 'https://www.yamaha-motor.com.tw/',
        ]);
    }
}
