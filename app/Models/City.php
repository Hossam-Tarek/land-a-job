<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded;

    public function profiles()
    {
        return $this->hasMany("\App\Models\Profile");
    }

    public function country()
    {
        return $this->belongsTo("\App\Models\Country");
    }

    public function companies()
    {
        return $this->hasMany("\App\Models\Company");
    }

    public function jobs()
    {
        return $this->hasMany("\App\Models\Job");
    }
}
