<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('billingAddressFk');
            $table->string('title');
            $table->string('familyname');
            $table->string('surname');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('phone');
            $table->string('email');
            $table->date('dateOfBirth');
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
        Schema::dropIfExists('tenant');
    }
}
