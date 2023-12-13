<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->comment('編號(主鍵)');
            $table->unsignedBigInteger('sid')->comment('車商(外部鍵)');
            $table->string('model')->comment('型號');
            $table->tinyInteger('riding_noise')->unsigned()->comment('騎乘噪音值');
            $table->tinyInteger('idle_noise')->unsigned()->comment("怠速噪音值");
            $table->double('max_power')->unsigned()->comment("最大動力");
            $table->unsignedBigInteger('max_rpm')->comment("最大動力轉速");
            $table->double('displacement')->unsigned()->comment("排氣量");
            $table->timestamps();
            $table->foreign('sid')->references('id')->on('store');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
