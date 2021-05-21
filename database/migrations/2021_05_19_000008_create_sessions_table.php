<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('session_date')->nullable();
            $table->string('session_type')->nullable();
            $table->string('session_location')->nullable();
            $table->decimal('session_total', 15, 2)->nullable();
            $table->string('session_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
