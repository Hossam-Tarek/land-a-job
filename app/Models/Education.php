<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'education';
    protected $fillable = ['start_date', 'end_date', 'organization','grade','degree','field_of_study','description','user_id'];
    protected $hidden = ['created_at','updated_at'];

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
