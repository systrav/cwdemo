<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 		if (Schema::hasTable('attachments')) return;

        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->index();
            $table->string('mime_type');
            $table->timestamps();
        });
        
        // for mediumblob 
        DB::statement("ALTER TABLE attachments ADD COLUMN data MEDIUMBLOB");

   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
   		Schema::dropIfExists('attachments');
    }
}
