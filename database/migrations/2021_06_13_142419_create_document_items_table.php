<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('product_id');
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('unit');
            $table->bigInteger('quantity');
            $table->bigInteger('unit_price');
            $table->bigInteger('tax');
            $table->bigInteger('price_excl');
            $table->bigInteger('total');
            $table->boolean('is_service')->default(0);
            $table->timestamps();
            $table->foreign('document_id')->on('documents')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('store_id')->on('stores')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_id')->on('products')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_items');
    }
}
