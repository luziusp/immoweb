<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('startDate');
            $table->date('terminationDate');
            $table->tinyInteger('tenantMapFk');
            $table->tinyInteger('appartmentFk');
            $table->boolean('isActive');
            $table->tinyInteger('rentPerMonth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract');
    }
}
