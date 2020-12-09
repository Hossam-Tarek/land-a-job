<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table ='experiences';

    function user(){
        return $this->belongsTo('App\Models\User');
    }

    function industryCategory(){
        return $this->belongsTo('App\Models\IndustryCategory');

    }

    function careerLevel(){
        return $this->belongsTo('App\Models\CareerLevel');


    }
}
