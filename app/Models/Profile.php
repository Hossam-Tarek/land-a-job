<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

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
