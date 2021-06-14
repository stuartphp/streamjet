<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('store_id');
            $table->integer('on_hand');
            $table->integer('min_order_level');
            $table->integer('min_order_quantity');
            $table->timestamps();
            $table->foreign('product_id')->on('products')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_id')->on('stores')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_levels');
    }
}
