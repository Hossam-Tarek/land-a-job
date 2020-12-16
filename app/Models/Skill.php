<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $guarded;

    function users(){
        return $this->belongsToMany('App\Models\User')->withPivot('year_of_experience','proficiency');
    }

    function jobs(){
        return $this->belongsToMany('App\Models\Job');
    }
}
