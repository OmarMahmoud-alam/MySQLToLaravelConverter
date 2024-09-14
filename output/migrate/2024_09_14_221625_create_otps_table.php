<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('otps', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->string('identifier', 255)->unsigned();
            $table->string('token', 255)->unsigned();
            $table->integer('validity', 11)->unsigned();
            $table->string('valid', 1)->unsigned()->autoIncrement()->default(1);
            $table->timestamps();
            $table->index(['id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('otps');
    }
};