<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
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
        'role'
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

    public function jobs()
    {
        return $this->belongsToMany("\App\Models\Job")->withPivot("status" ,"id");
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
        return $this->belongsToMany('App\Models\Language');
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

    function isUser()
    {
        if(Auth::user()->role === 'user') {
            return true;
        }
        return false;
    }

    function isAdmin()
    {
        if(Auth::user()->role === 'admin') {
            return true;
        }
        return false;
    }

    function isCompany()
    {
        if(Auth::user()->role === 'company') {
            return true;
        }
        return false;
    }
}
