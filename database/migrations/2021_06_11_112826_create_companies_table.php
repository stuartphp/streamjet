<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->char('attela_reference', 20)->unique();
            $table->unsignedBigInteger('created_by');
            $table->string('trading_name');
            $table->string('registered_as')->nullable();
            $table->string('registration_number', 50)->nullable();
            $table->string('vat_number', 50)->nullable();
            $table->string('contact_name');
            $table->string('contact_number');
            $table->text('physical_address');
            $table->text('postal_address');
            $table->string('domain');
            $table->string('url_contact_us');
            $table->string('url_terms_and_conditions');
            $table->string('url_privacy_policy');
            $table->string('slogan');
            $table->string('document_logo');
            $table->string('website_logo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
