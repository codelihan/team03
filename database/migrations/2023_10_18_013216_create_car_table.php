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
            $table->id()->comment('編號(主鍵)');
            $table->string("store")->comment('車商');
            $table->string('model')->comment('型號');
            $table->tinyInteger('riding_noise')->unsiged()->comment('騎乘噪音值');
            $table->tinyInteger('idle_noise')->unsiged()->comment("怠速噪音值");
            $table->double('max_power')->unsiged()->comment("最大動力");
            $table->tinyInteger('max_rpm')->unsiged()->comment("最大動力轉速");
            $table->double('displacement')->unsiged()->comment("排氣量");
            $table->timestamps();
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
