<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['job_id','status','user_id'];
    protected $hidden = ['created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo("\App\Models\User")->select(array('users.id', 'email' ,'first_name','last_name','role'));
    }

    public function job()
    {
        return $this->belongsTo("\App\Models\Job")->select(array('jobs.id', 'job_type_id', 'company_id'));
    }
}
