<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['user_email','name','proficiency'];
    protected $hidden = ['created_at','updated_at'];


    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
