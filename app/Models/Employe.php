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

class Employe extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const EMPLOYE_CONTRACT_SELECT = [
        'salary'    => 'Salaire',
        'comission' => 'Comission',
        'both'      => 'Les deux',
    ];

    public $table = 'employes';

    protected $appends = [
        'cin_file',
    ];

    protected $dates = [
        'employe_start',
        'employe_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employe_fname',
        'employe_lname',
        'employe_cin',
        'employe_cnss',
        'employe_birthday',
        'employe_orgin',
        'employe_salary',
        'employe_contract',
        'employe_start',
        'employe_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getCinFileAttribute()
    {
        return $this->getMedia('cin_file');
    }

    public function getEmployeStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEmployeStartAttribute($value)
    {
        $this->attributes['employe_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEmployeEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEmployeEndAttribute($value)
    {
        $this->attributes['employe_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
