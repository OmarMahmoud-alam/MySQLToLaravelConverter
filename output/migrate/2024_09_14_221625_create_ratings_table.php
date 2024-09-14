<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('user_id', 10)->unsigned();
            $table->integer('seller_id', 10)->unsigned();
            $table->string('rating', 4)->unsigned();
            $table->string('comment', 255)->unsigned()->autoIncrement()->default(null);
            $table->timestamps();
            $table->index(['user_id', 'seller_id']);
            $table->index(['seller_id']);
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};