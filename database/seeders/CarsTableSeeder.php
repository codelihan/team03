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

    $models = [];

    for ($i = 0; $i < 50; $i++) {
        $randomLetter1 = chr(rand(65, 90)); // ASCII 65-90 是大寫字母 A-Z
        $randomLetter2 = chr(rand(65, 90));
        $randomNumber = rand(10, 99);
        $models[] = $randomLetter1 . $randomLetter2 . '-' . $randomNumber;
    }

    while (!empty($models)) {
        $randomBike = $this->generateRandomBike($models, $usedModels);
        $createdAt = Carbon::now()->subDays(rand(1, 365)); // 隨機生成過去一年內的日期時間
        $updatedAt = $createdAt; // 新記錄的更新日期時間通常等於創建日期時間

        DB::table('cars')->insert([
            'sid' => rand(1, 12),
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

    $riding_noise = rand(90, 110); // 隨機生成騎乘噪音
    $idle_noise = rand(60, 90); // 隨機生成怠速噪音
    $max_power = rand(10, 200); // 隨機生成最大動力
    $max_rpm = rand(7000, 16000); // 隨機生成最大轉速
    $displacement = rand(100, 1200); // 隨機生成排氣量

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
