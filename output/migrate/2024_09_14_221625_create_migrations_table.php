<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('migrations', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->string('migration', 255)->unsigned();
            $table->integer('batch', 11)->unsigned();
        });
    }

    public function down()
    {
        Schema::dropIfExists('migrations');
    }
};