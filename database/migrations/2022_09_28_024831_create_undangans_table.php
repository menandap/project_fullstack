<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->biginteger("id_bank")->unsigned()->index()->nullable();
            $table->foreign('id_bank')->references('id')->on('banks')->onDelete('cascade');
            $table->string("title");
            $table->string("featured_image");
            $table->string("desc_main");
            $table->string("person_1");
            $table->string("person_2");
            $table->string("desc_1");
            $table->string("desc_2");
            $table->string("social_media_1");
            $table->string("social_media_2");
            $table->string("video")->nullable(); //video perjalanan cinta
            $table->string("wedding_date"); //tanggal pernikahan
            $table->string("wedding_ceremony"); //jam pernikahan
            $table->string("wedding_reception"); //jam resepsi
            $table->string("wedding_address"); //alamat pernikahan
            $table->string("gmaps_address"); //google maps alamat pernikahan (embeed maps)
            $table->string("hastag");
            $table->string("expired");
            $table->string("slug"); //shortlink untuk undangan
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
        Schema::dropIfExists('undangans');
    }
}
