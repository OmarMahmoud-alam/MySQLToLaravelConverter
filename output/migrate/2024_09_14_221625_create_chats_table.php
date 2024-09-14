<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned();
            $table->integer('user1_id', 10)->unsigned();
            $table->integer('user2_id', 10)->unsigned();
            $table->string('chats')->nullable();
            $table->timestamps();
            $table->foreign('user1_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
};