<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_client_name');
            $table->string('invoice_cin')->nullable();
            $table->string('invoice_ice')->nullable();
            $table->string('invoice_address')->nullable();
            $table->decimal('invoice_ttc', 15, 2)->nullable();
            $table->decimal('invoice_ht', 15, 2)->nullable();
            $table->string('invoice_tva')->nullable();
            $table->string('invoice_discount')->nullable();
            $table->string('invoice_discount_type')->nullable();
            $table->string('invoice_reason')->nullable();
            $table->string('invoice_status')->nullable();
            $table->date('invoice_date')->nullable();
            $table->integer('invoice_sequence')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
