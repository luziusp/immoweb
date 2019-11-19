<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('contractFk');
            $table->enum('type', ['rent', 'oil', 'repairs', 'energy', 'maintenance', 'other']);
            $table->double('amount');
            $table->date('dueDate');
            $table->boolean('isPayed')->nullable();
            $table->date('payedDate')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
