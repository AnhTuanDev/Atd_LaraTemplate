<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValuesTable extends Migration
{
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {

            $table->id();

            $table->foreignId('attribute_id')
                  ->nullable()
                  ->constrained('attributes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreignId('product_id')
                  ->nullable()
                  ->constrained('products')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->string('key');

            $table->string('value');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_values');
    }
}
