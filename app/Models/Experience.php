<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['job_title','company_name', 'company_web_url', 'city', 'country', 'start_date', 'end_date', 'responsibilities'];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = is_null($value) ? null : Carbon::parse($value)->toDateString();
    }
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = is_null($value) ? null : Carbon::parse($value)->toDateString();
    }
}
