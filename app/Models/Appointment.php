<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const APPOINTMENT_TYPE_SELECT = [
        'urgent' => 'urgent',
        'normal' => 'normal',
    ];

    public const APPOINTMENT_STATUS_SELECT = [
        'valid'  => 'valid',
        'cancel' => 'cancel',
        'report' => 'report',
    ];

    public $table = 'appointments';

    protected $dates = [
        'appointment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_id',
        'appointment_date',
        'appointment_time',
        'appointment_type',
        'appointment_status',
        'appointment_created_by_id',
        'appointment_update_by_id',
        'appointment_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getAppointmentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAppointmentDateAttribute($value)
    {
        $this->attributes['appointment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function appointment_created_by()
    {
        return $this->belongsTo(User::class, 'appointment_created_by_id');
    }

    public function appointment_update_by()
    {
        return $this->belongsTo(User::class, 'appointment_update_by_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
