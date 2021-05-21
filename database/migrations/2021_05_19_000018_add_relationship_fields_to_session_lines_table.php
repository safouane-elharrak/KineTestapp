<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSessionLinesTable extends Migration
{
    public function up()
    {
        Schema::table('session_lines', function (Blueprint $table) {
            $table->unsignedBigInteger('session_id')->nullable();
            $table->foreign('session_id', 'session_fk_3939056')->references('id')->on('sessions');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id', 'service_fk_3939057')->references('id')->on('services');
        });
    }
}
