<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->integer('user_id', 10)->unsigned();
            $table->integer('addresse_id', 10)->unsigned();
            $table->string('name', 255)->unsigned();
            $table->string('author', 50)->unsigned()->autoIncrement()->default(null);
            $table->string('status', 255)->unsigned();
            $table->string('price')->nullable();
            $table->text('discription')->unsigned()->autoIncrement()->default('their No discription');
            $table->timestamps();
            $table->index(['user_id']);
            $table->index(['addresse_id']);
            $table->foreign('addresse_id')->references('id')->on('addresses');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};