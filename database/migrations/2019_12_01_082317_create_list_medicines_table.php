<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medicine_id')->unsigned();
            $table->integer('price')->unsigned();
            $table->date('date_buy');
            $table->date('date_expired');
            $table->string('information');
            $table->integer('stock');
            $table->enum('status',array('sold','available','expired'));

            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
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
        Schema::dropIfExists('list_medicines');
    }
}
