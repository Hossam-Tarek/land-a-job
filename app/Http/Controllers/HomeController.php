<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Link;
use App\Models\Profile;
use App\Models\NumberOfEmployee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role === 'company') {
            Company::Create([
                'user_id' => auth()->user()->id,
                'country_id' => Country::first()->id,
                'city_id' => City::where('country_id', Country::first()->id)->first()->id,
                'name' => 'Company'.auth()->user()->id,
                'about' => '',
                'number_of_employee_id' => NumberOfEmployee::first()->id,
                'industry_category_id' => IndustryCategory::first()->id,
                'founded_date' => date("Y-m-d")
            ]);
            Link::create(['name' => 'linkedin', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'facebook', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'twitter', 'url' => '', 'user_id' => auth()->user()->id]);
            return redirect()->route('company.edit');

        } elseif (auth()->user()->role === 'user') {
            Link::create(['name' => 'linkedin', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'github', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'stackoverflow', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'behance', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'facebook', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'twitter', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'instagram', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'youtube', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'blog', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'website', 'url' => '', 'user_id' => auth()->user()->id]);
            Profile::create(['gender' => '0', 'military_status' => 'Does not apply' ,
            'education_level' => 'High School' , 'job_title' => '' , 'url' => '', 'user_id' => auth()->user()->id]);
            return redirect()->route('user.index');
        } elseif (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
        }
        return view('home');
    }

}
