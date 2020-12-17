<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\City;
use App\Models\IndustryCategory;
use App\Models\Language;
use App\Models\Skill;
use App\Models\JobTitle;
use App\Models\Message;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("admin");
    }

    public function index()
    {
        $data = [];
        $data['users'] = User::all()->count();
        $data['companies'] = Company::all()->count();
        $data['countries'] = Country::all()->count();
        $data['cities'] = City::all()->count();
        $data['categories'] = IndustryCategory::all()->count();
        $data['languages'] = Language::all()->count();
        $data['skills'] = Skill::all()->count();
        $data['jobTitles'] = JobTitle::all()->count();
        $data['messages'] = Message::all()->count();
        return view("admin.index",compact('data'));
    }
}
