<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->float('order')->nullable();
            $table->enum('location', [
                'navbar', 
                'sidebar', 
                'footer', 
                'header'
            ])->default('navbar');
            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('SET NULL')
                  ->onUpdate('cascade');
            $table->timestamps();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}