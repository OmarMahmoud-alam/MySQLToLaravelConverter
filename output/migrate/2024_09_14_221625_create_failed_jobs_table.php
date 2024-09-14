<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned()->autoIncrement();
            $table->string('uuid', 255)->unsigned();
            $table->text('connection')->unsigned();
            $table->text('queue')->unsigned();
            $table->string('payload')->unsigned();
            $table->string('exception')->unsigned();
            $table->timestamp('failed_at')->unsigned()->autoIncrement()->default(current_timestamp);
            $table->unique(['uuid']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};