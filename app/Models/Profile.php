<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','career_level_id','country_id','city_id',
                           'gender','min_salary','military_status','education_level','job_title','cv'];
    protected $hidden = ['created_at','updated_at'];

    public function careerLevel()
    {
        return $this->belongsTo("\App\Models\CareerLevel");
    }

    public function city()
    {
        return $this->belongsTo("\App\Models\City");
    }

    public function country()
    {
        return $this->belongsTo("\App\Models\Country");
    }

    public function user()
    {
        return $this->belongsTo("\App\Models\User");
    }
}
