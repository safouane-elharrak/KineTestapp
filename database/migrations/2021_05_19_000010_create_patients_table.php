<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_gender');
            $table->string('patient_fname')->nullable();
            $table->string('patient_lname')->nullable();
            $table->string('patient_cin')->nullable();
            $table->date('patient_birthday')->nullable();
            $table->string('patient_mobile')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_type')->nullable();
            $table->string('patient_insurance')->nullable();
            $table->string('patient_profession')->nullable();
            $table->longText('patient_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
