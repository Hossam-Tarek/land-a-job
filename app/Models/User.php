<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'password',
    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->belongsToMany("\App\Models\Application");
    }

    public function company()
    {
        return $this->hasOne("\App\Models\Company");
    }

    function links(){
        return $this->hasMany('App\Models\Link');
    }

    function certificates(){
        return $this->hasMany('App\Models\Certificate');
    }


    function education(){
        return $this->hasMany('App\Models\Education');
    }

    function jobTypes(){

        return $this->belongsToMany('App\Models\JobType');
    }

    function experiences(){
        return $this->hasMany('App\Models\Experience');
    }

    function languages(){
        return $this->hasMany('App\Models\Language');
    }

    function phoneNumbers(){
        return $this->hasMany('App\Models\PhoneNumber');

    }
    function skills(){
        return $this->belongsToMany('App\Models\Skill');
    }

    function jobTitles(){
        return $this->belongsToMany('App\Models\JobTitle');
    }

    function profile(){
        return $this->hasOne('App\Models\Profile');
    }
}
