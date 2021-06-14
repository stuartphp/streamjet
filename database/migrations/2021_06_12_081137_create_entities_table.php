<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->char('gcs', 1);
            $table->char('account_number',20);
            $table->string('registered_name')->nullable();
            $table->string('trading_name');
            $table->string('physical_address1');
            $table->string('physical_address2')->nullable();
            $table->unsignedInteger('physical_suburb');
            $table->unsignedInteger('physical_city');
            $table->unsignedInteger('physical_state');
            $table->unsignedInteger('physical_country');
            $table->string('physical_code', 20);
            $table->string('delivery_address1');
            $table->string('delivery_address2')->nullable();
            $table->unsignedInteger('delivery_suburb');
            $table->unsignedInteger('delivery_city');
            $table->unsignedInteger('delivery_state');
            $table->unsignedInteger('delivery_country');
            $table->string('delivery_code', 20);
            $table->bigInteger('credit_limit')->nullable();
            $table->bigInteger('delivery_group_id')->nullable();
            $table->char('currency_code', 3)->nullable();
            $table->unsignedTinyInteger('payment_terms')->default(1);
            $table->char('default_tax', 2)->default('01');
            $table->string('price_list', 50)->nullable();
            $table->boolean('accept_electronic_documents')->default(1);
            $table->string('documents_contact')->nullable();
            $table->string('documents_email')->nullable();
            $table->unsignedInteger('statement_message')->nullable();
            $table->string('statement_contact')->nullable();
            $table->string('statement_email')->nullable();
            $table->string('telephone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('tax_reference');
            $table->boolean('is_newsletter')->default(0);
            $table->boolean('is_sms')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->on('companies')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
