<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkset1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('invoice', function (Blueprint $table) {


        $table->foreign('contractFk')->references('id')->on('contract');
});
/*
    Schema::table('appartment', function (Blueprint $table) {

        $table->foreign('contractFk')->references('id')->on('contract');
});
*/
    Schema::table('tenant', function (Blueprint $table) {

        $table->foreign('billingAddressFk')->references('id')->on('billing_address');
});

    Schema::table('tenantmap', function (Blueprint $table) {

        $table->foreign('contractFk')->references('id')->on('contract');
});


    Schema::table('tenantmap', function (Blueprint $table) {

        $table->foreign('tenantFk')->references('id')->on('tenant');
});

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    Schema::table('invoice', function (Blueprint $table) {
        $table->dropForeign('invoice_contractFk_foreign');
   });

    Schema::table('appartment', function (Blueprint $table) {
        $table->dropForeign('appartment_contractFk_foreign');
        });

         Schema::table('tenant', function (Blueprint $table) {
             $table->dropForeign('tenant_billingAddressFk_foreign');
        });



         Schema::table('tenantmap', function (Blueprint $table) {
             $table->dropForeign('tenantmap_contractFk_foreign');
        });



         Schema::table('tenantmap', function (Blueprint $table) {
             $table->dropForeign('tenantmap_tenantFk_foreign');
        });

    }
}

