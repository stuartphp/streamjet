<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('document_flow_id');
            $table->string('document_type', 30);
            $table->char('gcs', 1);
            $table->date('action_date');
            $table->string('account_number');
            $table->unsignedBigInteger('entity_id');
            $table->string('entity_name');
            $table->string('document_number');
            $table->text('physical_address');
            $table->text('delivery_address');
            $table->string('entity_reference');
            $table->unsignedBigInteger('salesperson_id')->nullable();
            $table->date('due_date');
            $table->text('notes');
            $table->unsignedSmallInteger('financial_period');
            $table->unsignedInteger('courier_id');
            $table->string('tracking_number');
            $table->string('document_image');
            $table->unsignedBigInteger('total_nett_price');
            $table->unsignedBigInteger('total_excl');
            $table->unsignedBigInteger('total_discount');
            $table->unsignedBigInteger('total_tax');
            $table->unsignedBigInteger('total_amount');
            $table->boolean('on_hold');
            $table->boolean('is_locked');
            $table->boolean('on_hold');
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
        Schema::dropIfExists('documents');
    }
}
