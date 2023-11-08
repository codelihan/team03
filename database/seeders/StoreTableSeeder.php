<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen(string:$characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(min:0, max:$charactersLength - 1)];
        }
        return $randomString;
    }

    public function generateRandomName() {
        $names = array(
            'YAMAHA',
            'HONDA',
            'SYM',
            'KYMCO',
            'CF MOTO',
            'Ducati',
            'suzuki',
            'PGO',
            'AEON',
            'GOGORO',
            'aprilia',
            'BMW',
            'kawasaki',
            'KTM',
            'Triumph'
        );
        return $names[rand(0, count($names) - 1)];
    }

    public function generateRandomCountry() {
        $codes = array(
            'jp',
            'jp',
            'tw',
            'tw',
            'cn',
            'lt',
            'jp',
            'tw',
            'tw',
            'tw',
            'lt',
            'de',
            'jp',
            'at',
            'uk'
        );
        return $codes[rand(0, count($codes) - 1)];
    }

    public function generateRandomService() {
        $min = 1; // 最小值
        $max = 5000; // 最大值，根据你的需求进行调整

        // 使用 rand() 函数生成随机整数
        $randomService = rand($min, $max);

        // 如果你想使用 mt_rand() 函数，可以将上述行替换为下面的代码
        // $randomService = mt_rand($min, $max);

        return $randomService;
    }

    public function generateRandomInfo() {
        $length = 20; // 你可以根据需要来设置随机字符串的长度
        $randomInfo = $this->generateRandomString($length);
        return $randomInfo;
    }

    public function generateRandomUrl() {
        $length = 20; // 你可以根据需要来设置随机字符串的长度
        $randomUrl = $this->generateRandomString($length);
        return $randomUrl;
    }

    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            $name = $this->generateRandomName();
            $country = $this->generateRandomCountry();
            $service = $this->generateRandomService();
            $info = $this->generateRandomInfo();
            $url = $this->generateRandomUrl();
            $random_datetime = Carbon::now()->subMinutes(rand(1, 55));
            DB::table(table:'store')->insert([
                'name' => $name,
                'country' => $country,
                'service' => $service,
                'info' => $info,
                'url' => $url,
                'created_at' => $random_datetime,
                'updated_at' => $random_datetime,
            ]);
        }
    }
}
