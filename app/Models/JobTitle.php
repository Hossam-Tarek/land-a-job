<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable=["title","industry_category_id"];
    function users(){
        return $this->belongsToMany('App\Models\User');
    }

    function industryCategory(){
        return $this->belongsTo('App\Models\IndustryCategory');

    }

}
