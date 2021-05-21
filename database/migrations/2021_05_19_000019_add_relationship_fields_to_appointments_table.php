<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id', 'patient_fk_3939435')->references('id')->on('patients');
            $table->unsignedBigInteger('appointment_created_by_id')->nullable();
            $table->foreign('appointment_created_by_id', 'appointment_created_by_fk_3939440')->references('id')->on('users');
            $table->unsignedBigInteger('appointment_update_by_id')->nullable();
            $table->foreign('appointment_update_by_id', 'appointment_update_by_fk_3939441')->references('id')->on('users');
        });
    }
}
