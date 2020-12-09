<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    function users(){
        return $this->belongsToMany('App\Models\User');
    }

    function jobs(){
        return $this->belongsToMany('App\Models\Job');
    }
}
