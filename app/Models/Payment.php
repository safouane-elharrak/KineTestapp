<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PAYEMENT_METHOD_SELECT = [
        'cc'        => 'Carte de crédit',
        'cash'      => 'Espèce',
        'check'     => 'chèque',
        'transfert' => 'virement',
        'tpe'       => 'TPE',
        'coupoun'   => 'coupon',
    ];

    public $table = 'payments';

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'payement_method',
        'payment_date',
        'payment_ref',
        'note',
        'payement_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
