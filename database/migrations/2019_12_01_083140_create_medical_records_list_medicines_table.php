<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRecordsListMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records_list_medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medical_record_id')->unsigned();
            $table->bigInteger('list_medicine_id')->unsigned();

            $table->foreign('medical_record_id')->references('id')->on('medical_records')->onDelete('cascade');
            $table->foreign('list_medicine_id')->references('id')->on('list_medicines')->onDelete('cascade');
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
        Schema::dropIfExists('medical_records_list_medicines');
    }
}
