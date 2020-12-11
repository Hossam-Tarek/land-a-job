<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded;

    public function cities()
    {
        return $this->hasMany("\App\Models\City");
    }

    public function companies()
    {
        return $this->hasMany("\App\Models\Company");
    }

    public function jobs()
    {
        return $this->hasMany("\App\Models\Job");
    }

    public function profiles()
    {
        return $this->hasMany("\App\Models\Profile");
    }
}
