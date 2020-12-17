<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\Link;
use App\Models\NumberOfEmployee;

class CreateCompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.register", [
            "user_id" => auth()->user()->id,
            "countries" => Country::all(),
            "cities" => [],
            "industryCategories" => IndustryCategory::all(),
            "numberOfEmployees" => NumberOfEmployee::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        if (Company::where('name', $request->name)->count() == 0 && Company::where('url', $request->url)->count() == 0) {
            Company::create($request->all());
            Link::create(['name' => 'linkedin', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'facebook', 'url' => '', 'user_id' => auth()->user()->id]);
            Link::create(['name' => 'twitter', 'url' => '', 'user_id' => auth()->user()->id]);
            return redirect(route("company.index"));
        } else {
            $errors = [];
            if (Company::where('name', $request->name)->count() > 0) {
                $errors['name'] = 'The name has already been taken.';
            }
            if (Company::where('url', $request->url)->count() > 0) {
                $errors['url'] = 'The url has already been taken.';
            }
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

}
