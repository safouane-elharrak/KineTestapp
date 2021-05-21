<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payement_method');
            $table->date('payment_date')->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('note')->nullable();
            $table->decimal('payement_amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
