<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const SESSION_TYPE_SELECT = [
        'type1' => 'type1',
        'type2' => 'type2',
    ];

    public const SESSION_STATUS_SELECT = [
        'paid'    => 'Payé',
        'part'    => 'Partiellement',
        'overdue' => 'En retard',
    ];

    public $table = 'sessions';

    protected $dates = [
        'session_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'session_date',
        'patient_id',
        'session_type',
        'session_location',
        'user_id',
        'employe_id',
        'session_total',
        'session_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getSessionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSessionDateAttribute($value)
    {
        $this->attributes['session_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
