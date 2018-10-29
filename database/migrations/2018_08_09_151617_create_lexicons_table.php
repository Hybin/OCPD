<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLexiconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lexicons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cn_character');            // 汉字
            $table->string('phonetic_element');      // 声符
            $table->string('rhyme_element');      // 韵部
            $table->string('reconstruction_wl');           // 拟音-王力
            $table->string('reconstruction_lfg');          // 拟音-李方桂
            $table->string('reconstruction_byp');          // 拟音-白一平
            $table->string('reconstruction_byps');         // 拟音-白一平——沙加尔
            $table->string('reconstruction_zzsf');         // 拟音-郑张尚芳
            $table->string('traditional_pronunciation');         // 广韵反切
            $table->string('rhythm_status');        // 音韵地位
            $table->string('guangyun_position');          // 广韵位置
            $table->string('modern_pronunciation');         // 今读
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lexicons');
    }
}
