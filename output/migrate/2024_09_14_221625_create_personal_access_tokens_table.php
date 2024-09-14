<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned()->autoIncrement();
            $table->string('tokenable_type', 255)->unsigned();
            $table->bigInteger('tokenable_id', 20)->unsigned();
            $table->string('name', 255)->unsigned();
            $table->string('token', 64)->unsigned();
            $table->text('abilities')->unsigned()->autoIncrement()->default(null);
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->unique(['token']);
            $table->index(['tokenable_type', 'tokenable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};