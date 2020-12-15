<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table ='experiences';
    protected $fillable =['title','start_date','end_date','company','description','user_id','industry_category_id','career_level_id'];
    
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
