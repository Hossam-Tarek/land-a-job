<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded;

    public function applications()
    {
        return $this->hasMany("\App\Models\Application");
    }

    public function careerLevel()
    {
        return $this->belongsTo("\App\Models\CareerLevel");
    }

    public function city()
    {
        return $this->belongsTo("\App\Models\City");
    }

    public function company()
    {
        return $this->belongsTo("\App\Models\Company");
    }

    public function country()
    {
        return $this->belongsTo("\App\Models\Country");
    }

    public function skills()
    {
        return $this->belongsToMany("\App\Models\Skill");
    }

    public function jobType()
    {
        return $this->belongsTo("\App\Models\JobType");
    }

    public function industryCategory()
    {
        return $this->belongsTo("\App\Models\IndustryCategory");
    }
}
