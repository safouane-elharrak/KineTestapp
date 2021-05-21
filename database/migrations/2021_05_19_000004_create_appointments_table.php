<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('appointment_date');
    /** */              $table->time('start_time')->nullable();
    $table->time('finish_time')->nullable();
/** */
            $table->string('appointment_type')->nullable();
            $table->string('appointment_status')->nullable();
            $table->string('appointment_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
