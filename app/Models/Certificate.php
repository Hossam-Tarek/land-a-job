<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable=["name","awarded_date","certificate_url","organization","user_id"];


    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
