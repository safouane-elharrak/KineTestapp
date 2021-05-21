<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'invoice_id',
        'invoiceLine_service_quantity',
        'invoiceLine_price_per_unit'
    ];
    public function Service(){
        return $this->belongsTo(Service::class);
    }
    public function Invoices(){
        return $this->belongsTo(Invoices::class);
    }
}
