<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    function users(){
        return $this->belongsToMany('App\Models\User');
    }

    function industryCategory(){
        return $this->belongsTo('App\Models\IndustryCategory');

    }

}
