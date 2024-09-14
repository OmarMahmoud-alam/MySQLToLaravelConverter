<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('event_interests', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->integer('user_id', 10)->unsigned()->autoIncrement()->default(null);
            $table->integer('event_id', 10)->unsigned()->autoIncrement()->default(null);
            $table->string('type', [])->nullable();
            $table->timestamps();
            $table->index(['user_id']);
            $table->index(['event_id']);
            $table->foreign('event_id')->references('id')->on('events')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_interests');
    }
};