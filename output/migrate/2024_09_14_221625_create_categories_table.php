<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->string('name', 255)->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};