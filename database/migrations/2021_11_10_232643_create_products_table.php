<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('category_id')
                  ->nullable()
                  ->constrained('categories')
                  ->onDelete('SET NULL')
                  ->onUpdate('cascade');
            $table->text('description');
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('sku')->default('tf_ds_01');
            $table->decimal('price')->nullable();
            $table->decimal('quantity')->default(10);
            $table->float('discount')->nullable();
            $table->boolean('stock')->default(1);
            $table->boolean('status')->default(1);
            $table->string('cover_image')->default('/git_storage/product/cover/cover_default');
            $table->string('photos')->default('/git_storage/product/photos/photo_default');
            $table->boolean('featured')->nullable();
            $table->boolean('home_banner')->nullable();

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
        Schema::dropIfExists('products');
    }
}
