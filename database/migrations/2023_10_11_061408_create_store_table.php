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
        Schema::create('store', function (Blueprint $table) {
            $table->id()->comment('編號(主鍵');
            $table->string('name')->comment('車商名稱');
            $table->string('country')->comment('地區');
            $table->string('service')->unsiged()->comment('據點數量');
            $table->string('info')->comment('簡介');
            $table->string('url')->comment('網址');
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
        Schema::dropIfExists('store');
    }
};
