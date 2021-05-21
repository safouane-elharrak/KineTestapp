<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name');
            $table->string('service_reference')->nullable();
            $table->boolean('service_active')->default(0)->nullable();
            $table->decimal('service_price', 15, 2);
            $table->decimal('service_min_price', 15, 2)->nullable();
            $table->string('service_max_price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
