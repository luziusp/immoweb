<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingAdressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_address', function (Blueprint $table) {
            $table->bigIncrements('id' );
            $table->timestamps();
                                $table->string('billingTitle');
                                $table->string('billingFamilyName');
                                $table->string('billingSurName');
                                $table->string('billingZipCode');
                                $table->string('billingCityName');
                                $table->string('billingStreetName');
                                $table->string('billingAdditionalStreetName');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_address');
    }
}
