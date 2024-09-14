<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('user_id', 10)->unsigned();
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->timestamps();
            $table->index(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};