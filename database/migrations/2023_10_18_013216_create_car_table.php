<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            //這版本是正常的
            $table->id()->comment('編號(主鍵)');
            $table->unsignedBigInteger('store_id')->comment('車商(外部建)');
            $table->string('model')->comment('型號');
            $table->tinyInteger('riding_noise')->unsigned()->comment('騎乘噪音值');
            $table->tinyInteger('idle_noise')->unsigned()->comment("怠速噪音值");
            $table->double('max_power')->unsigned()->comment("最大動力");
            $table->unsignedInteger('max_rpm')->unsigned()->comment("最大動力轉速");
            $table->double('displacement')->unsigned()->comment("排氣量");
            $table->timestamps();

            // 定義外鍵約束
            $table->foreign('store_id')->references('id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car');
    }
};
