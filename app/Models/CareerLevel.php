<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerLevel extends Model
{
    use HasFactory;
    protected $guarded;

    public function profiles()
    {
        return $this->hasMany("\App\Models\Profile");
    }

    public function jobs()
    {
        return $this->hasMany("\App\Models\Job");
    }

    public function experiences()
    {
        return $this->hasMany("\App\Models\Experience");
    }
}
