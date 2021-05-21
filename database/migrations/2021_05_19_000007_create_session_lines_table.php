<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionLinesTable extends Migration
{
    public function up()
    {
        Schema::create('session_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('detail')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
