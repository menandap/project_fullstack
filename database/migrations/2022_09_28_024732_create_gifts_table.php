<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->biginteger("id_user")->unsigned()->index()->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string("sender");
            $table->string("account_owner");
            $table->string("message");
            $table->string("amount");
            $table->string("proof_transfer");
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
        Schema::dropIfExists('gifts');
    }
}
