<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('employe_fname');
            $table->string('employe_lname');
            $table->string('employe_cin');
            $table->string('employe_cnss')->nullable();
            $table->string('employe_birthday')->nullable();
            $table->string('employe_orgin')->nullable();
            $table->decimal('employe_salary', 15, 2)->nullable();
            $table->string('employe_contract')->nullable();
            $table->date('employe_start')->nullable();
            $table->date('employe_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
