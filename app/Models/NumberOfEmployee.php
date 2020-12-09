<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumberOfEmployee extends Model
{
    use HasFactory;

    public function companies()
    {
        return $this->hasMany("\App\Models\Company");
    }
}
