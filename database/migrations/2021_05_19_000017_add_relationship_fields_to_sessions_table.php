<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->foreign('patient_id', 'patient_fk_3933361')->references('id')->on('patients');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_3933364')->references('id')->on('users');
            $table->unsignedBigInteger('employe_id')->nullable();
            $table->foreign('employe_id', 'employe_fk_3933365')->references('id')->on('employes');
        });
    }
}
