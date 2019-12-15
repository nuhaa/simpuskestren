<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('register_id')->unsigned();
            $table->bigInteger('doctor_id')->unsigned();
            $table->bigInteger('poly_id')->unsigned();
            $table->string('first_diagnosis');
            $table->string('doctor_diagnosis')->nullable();
            $table->string('keterangan');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('poly_id')->references('id')->on('polies')->onDelete('cascade');
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
        Schema::dropIfExists('medical_records');
    }
}
