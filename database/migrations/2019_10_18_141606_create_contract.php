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
            $table->date('terminationDate')->nullable();
            $table->tinyInteger('tenantMapFk')->nullable();
            $table->tinyInteger('appartmentFk')->nullable();
            $table->boolean('isActive');
            $table->double('rentPerMonth');
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
