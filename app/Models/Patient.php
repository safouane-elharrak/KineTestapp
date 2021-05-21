<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Patient extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const PATIENT_TYPE_SELECT = [
        'type1' => 'Type 1',
        'type2' => 'Type 2',
    ];

    public const PATIENT_INSURANCE_SELECT = [
        'amo'     => 'AMO',
        'private' => 'Privé',
    ];

    public const PATIENT_GENDER_SELECT = [
        'man'    => 'Homme',
        'women'  => 'Femme',
        'childm' => 'Garçon',
        'childw' => 'Fille',
    ];

    public $table = 'patients';

    protected $dates = [
        'patient_birthday',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_gender',
        'patient_fname',
        'patient_lname',
        'patient_cin',
        'patient_birthday',
        'patient_mobile',
        'patient_email',
        'patient_type',
        'patient_insurance',
        'patient_profession',
        'patient_note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id', 'id');
    }

    public function getPatientBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPatientBirthdayAttribute($value)
    {
        $this->attributes['patient_birthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
