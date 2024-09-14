<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('messagechats', function (Blueprint $table) {
            $table->integer('sender_id', 10)->unsigned();
            $table->integer('reciever_id', 10)->unsigned();
            $table->integer('chat_id', 10)->unsigned();
            $table->text('message')->unsigned()->autoIncrement()->default(null);
            $table->timestamps();
            $table->index(['sender_id']);
            $table->index(['reciever_id']);
            $table->foreign('reciever_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messagechats');
    }
};