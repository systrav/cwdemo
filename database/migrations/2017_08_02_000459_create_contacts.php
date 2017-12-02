<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContacts extends Migration
{
    /**
     * Run the migrations.
     * 性(text)、名(text)、両方のフリガナ(text)、性別(radio)、生年月日（Date picker付き text）、電話番号(text × 3)、備考欄（textarea）
     *
     * @return void
     */
    public function up()
    {
		if (Schema::hasTable('contacts')) return;

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('firstname_kana');
            $table->string('lastname');
            $table->string('lastname_kana');
            $table->string('gender');
            $table->string('birth_date');
            $table->string('telno_1');
            $table->string('telno_2')->nullable();
            $table->string('telno_3')->nullable();
            $table->text('memo_1')->nullable();
            $table->string('title');
            $table->text('body');
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
   		Schema::dropIfExists('contacts');
    }
}
