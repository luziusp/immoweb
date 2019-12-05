<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('appartmentName');
            $table->double('noOfRooms');
            $table->tinyInteger('squareMeters');
            $table->string('Description')->nullable();
            $table->double('rentCost')->nullable();
            $table->double('additionalCost')->nullable();
            $table->boolean('isActive');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appartment');
    }
}
