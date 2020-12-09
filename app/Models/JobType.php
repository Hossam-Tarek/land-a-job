<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_types';

    function users(){
        return $this->belongsToMany('App\Models\User');
    }
    function job(){
        return $this->belongsTo('App\Models\Job');
    }
}
