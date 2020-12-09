<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryCategory extends Model
{
    use HasFactory;



    function experiences(){
        return $this->hasMany('App\Models\Experience');
    }

    ///////////////// Hossam And Fawzy

    function jobs(){
        return $this->hasMany('App\Models\Job');
    }

    function companies(){
        return $this->belongsToMany('App\Models\Company');
    }
    /////////////////////////////

    function jobTitles(){
        return $this->hasMany('App\Models\JobTitle');
    }
}
