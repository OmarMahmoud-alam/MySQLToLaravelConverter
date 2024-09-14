<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned()->autoIncrement();
            $table->string('Photoable_type', 255)->unsigned();
            $table->bigInteger('Photoable_id', 20)->unsigned();
            $table->string('src', 255)->unsigned();
            $table->string('type', 255)->unsigned();
            $table->timestamps();
            $table->index(['Photoable_type', 'Photoable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
};