<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const INVOICE_REASON_SELECT = [
        'mutual'      => 'mutual',
        'insurance'   => 'insurance',
        'declaration' => 'declaration',
    ];

    public $table = 'invoices';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'invoice_client_name',
        'invoice_cin',
        'invoice_ice',
        'invoice_address',
        'invoice_ttc',
        'invoice_ht',
        'invoice_tva',
        'invoice_discount',
        'invoice_discount_type',
        'invoice_reason',
        'invoice_status',
        'invoice_date',
        'invoice_sequence',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function InvoiceLine(){
        return $this->hasMany(InvoiceLine::class);
    }
    public static function boot(){

        parent::boot();

        static::creating(function($model){
            $maxValue = Invoices::max('invoice_sequence');
            $maxValue++;
            $model->invoice_sequence = $maxValue;
            
        });
    }
}
