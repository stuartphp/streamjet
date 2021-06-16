<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('store_id');
            $table->double('cost_price')->nullable();
            $table->double('retail');
            $table->double('dealer')->nullable();
            $table->double('whole_sale')->nullable();
            $table->double('price_list1')->nullable();
            $table->double('price_list2')->nullable();
            $table->double('price_list3')->nullable();
            $table->double('price_list4')->nullable();
            $table->double('price_list5')->nullable();
            $table->double('special')->nullable();
            $table->dateTime('special_from')->nullable();
            $table->dateTime('special_to')->nullable();
            $table->boolean('allow_tax')->default(1);
            $table->char('purchase_tax_type', 2);
            $table->char('sales_tax_type', 2);
            $table->boolean('sales_commission_item');
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
        Schema::dropIfExists('product_prices');
    }
}
