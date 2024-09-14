<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', 10)->unsigned()->autoIncrement();
            $table->string('name', 255)->unsigned();
            $table->string('email', 255)->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255)->unsigned();
            $table->string('state', 255)->unsigned()->autoIncrement()->default(null);
            $table->integer('address_id', 10)->unsigned()->autoIncrement()->default(null);
            $table->string('phone', 255)->unsigned()->autoIncrement()->default(null);
            $table->string('darkmode', 1)->unsigned()->autoIncrement()->default(0);
            $table->string('remember_token', 100)->unsigned()->autoIncrement()->default(null);
            $table->timestamps();
            $table->unique(['email']);
            $table->index(['address_id']);
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};