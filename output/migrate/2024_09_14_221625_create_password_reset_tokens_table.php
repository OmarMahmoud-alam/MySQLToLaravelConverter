<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email', 255)->unsigned();
            $table->string('token', 255)->unsigned();
            $table->primary('email');
        });
    }

    public function down()
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};