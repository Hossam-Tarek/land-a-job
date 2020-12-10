<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded;

    public function city()
    {
        return $this->belongsTo("\App\Models\City");
    }

    public function user()
    {
        return $this->belongsTo("\App\Models\User");
    }

    public function industryCategory()
    {
        return $this->belongsTo("\App\Models\IndustryCategory");
    }

    public function country()
    {
        return $this->belongsTo("\App\Models\Country");
    }

    public function jobs()
    {
        return $this->hasMany("\App\Models\Job");
    }

    public function numberOfEmployees()
    {
        return $this->belongsTo("\App\Models\NumberOfEmployee");
    }
}
