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
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('product_category_id');
            $table->string('product_code');
            $table->string('name');
            $table->text('description');
            $table->string('keywords')->nullable();
            $table->string('barcode')->nullable();
            $table->string('isbn_number')->nullable();
            $table->unsignedBigInteger('product_unit_id');
            $table->string('main_image');
            $table->unsignedInteger('viewed');
            $table->boolean('is_service');
            $table->boolean('is_active');
            $table->boolean('is_feature');
            $table->timestamps();
            $table->foreign('company_id')->on('companies')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_category_id')->on('product_categories')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_unit_id')->on('product_units')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
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
