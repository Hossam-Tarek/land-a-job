<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['job_id','status'];
    
    public function users()
    {
        return $this->belongsToMany("\App\Models\User")->select(array('users.id', 'email' ,'first_name','role'));
    }

    public function job()
    {
        return $this->belongsTo("\App\Models\Job")->select(array('jobs.id', 'job_type_id', 'company_id'));
    }
}
