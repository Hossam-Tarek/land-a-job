<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::all();
//        dd($jobs);
        return view('user.job.index');
    }

    public function explore(){
        dd('explore');
    }
}
