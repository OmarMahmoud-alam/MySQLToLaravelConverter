<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->integer('user_id', 10)->unsigned()->autoIncrement()->default(null);
            $table->string('name', 255)->unsigned();
            $table->string('place_link', 255)->unsigned();
            $table->string('discription', 255)->unsigned();
            $table->dateTime('startat')->unsigned();
            $table->dateTime('endedat')->unsigned();
            $table->string('online', 1)->unsigned()->autoIncrement()->default(0);
            $table->timestamps();
            $table->index(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};