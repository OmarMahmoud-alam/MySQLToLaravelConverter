<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->integer('book_id', 10)->unsigned();
            $table->integer('category_id', 10)->unsigned();
            $table->primary('book_id', 'category_id');
            $table->index(['category_id']);
            $table->foreign('book_id')->references('id')->on('books')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
};