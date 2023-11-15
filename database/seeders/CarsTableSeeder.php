<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $usedModels = []; // 用來追蹤已經使用過的型號

    $models = [
        'Honda CBR1000RR', 'Yamaha YZF-R1', 'Kawasaki Ninja ZX-10R',
        'Suzuki GSX-R1000', 'Ducati Panigale V4', 'BMW S1000RR',
        'Triumph Daytona 675', 'Aprilia RSV4', 'MV Agusta F4',
        'KTM 1290 Super Duke R', 'Harley-Davidson Sportster', 'Indian Scout',
        'Victory Octane', 'Moto Guzzi V7', 'Royal Enfield Classic 500',
        'Kymco Agility', 'Vespa Primavera', 'Piaggio MP3', 'SYM Wolf',
        'Hyosung GT250R', 'Kawasaki Versys-X 300', 'Suzuki V-Strom 650',
        'Honda CRF250L', 'KTM 390 Duke', 'Yamaha WR250R',
        'BMW G310GS', 'Triumph Bonneville T100', 'Ducati Scrambler',
        'Kawasaki Z650', 'Suzuki SV650', 'Yamaha MT-07',
        'Honda CB500F', 'KTM 690 Duke', 'Harley-Davidson Street 500',
        'Indian Scout Sixty', 'Victory Gunner', 'Moto Guzzi V9',
        'Kawasaki Z125 Pro', 'Honda Ruckus', 'Yamaha Zuma',
        'Vespa GTS', 'Piaggio Fly', 'SYM Jet', 'Hyosung GD250R',
        'KTM 1290 Super Adventure', 'Suzuki V-Strom 1000', 'BMW R1250GS',
        'Triumph Tiger 800', 'Ducati Multistrada 950',
    ];

    while (!empty($models)) {
        $randomBike = $this->generateRandomBike($models, $usedModels);
        $createdAt = Carbon::now()->subDays(rand(1, 365)); // 隨機生成過去一年內的日期時間
        $updatedAt = $createdAt; // 新記錄的更新日期時間通常等於創建日期時間

        DB::table('cars')->insert([
            'store_id' => rand(1, 16),
            'model' => $randomBike['model'],
            'riding_noise' => $randomBike['riding_noise'],
            'idle_noise' => $randomBike['idle_noise'],
            'max_power' => $randomBike['max_power'],
            'max_rpm' => $randomBike['max_rpm'],
            'displacement' => $randomBike['displacement'],
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        $usedModels[] = $randomBike['model']; // 將已使用的型號添加到陣列中
    }
}

// 生成隨機機車資訊的函數，避免已使用的型號
public function generateRandomBike(&$models, &$usedModels)
{
    if (empty($models)) {
        return null; // 如果沒有可選的型號，返回 null 或其他標示值
    }

    $model = $models[array_rand($models)]; // 隨機選擇一個型號

    $riding_noise = rand(40, 60); // 隨機生成騎乘噪音
    $idle_noise = rand(15, 30); // 隨機生成怠速噪音
    $max_power = rand(10, 20); // 隨機生成最大動力
    $max_rpm = rand(12000, 16000); // 隨機生成最大轉速
    $displacement = rand(100, 200); // 隨機生成排氣量

    $bikeInfo = [
        'model' => $model,
        'riding_noise' => $riding_noise,
        'idle_noise' => $idle_noise,
        'max_power' => $max_power,
        'max_rpm' => $max_rpm,
        'displacement' => $displacement,

    ];

    unset($models[array_search($model, $models)]); // 從可選的型號中刪除已使用的型號

    return $bikeInfo;
}



}
