<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Link;
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
                'name'> '',
                'about' => '',
                'number_of_employee_id' => NumberOfEmployee::first()->id,
                'industry_category_id' => IndustryCategory::first()->id,
                'founded_date' => date("Y-m-d")
            ]);
            Link::create(['name' => 'linkedin', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'facebook', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'twitter', 'url' => '', 'user_id' => auth()->user()->id]);
            return redirect()->route();
        } elseif (auth()->user()->role === 'user') {
            return redirect()->route('user.index');
        } elseif (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
        }
        return view('home');
    }

}
