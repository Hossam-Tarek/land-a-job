<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\NumberOfEmployee;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("companies.index", ["companies" => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("companies.create", [
            "countries" => Country::all(),
            "cities" => City::all(),
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
    public function store(Request $request)
    {
        Company::create($this->validateCompany());
        if ($request->logo) {
            $request->logo->move("avatar", time().$request->logo->getClientOriginalName());
        }
        if ($request->cover_image){
            $request->cover_image->move("avatar", time().$request->cover_image->getClientOriginalName());
        }
        return redirect(route("companies.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view("companies.show", compact("company"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view("companies.edit", [
            "company" => $company,
            "countries" => Country::all(),
            "cities" => City::all(),
            "industryCategories" => IndustryCategory::all(),
            "numberOfEmployees" => NumberOfEmployee::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($this->validateCompany());
        if ($request->logo){
            $request->logo->move("avatar", time().$request->logo->getClientOriginalName());
        }
        if ($request->cover_image){
            $request->cover_image->move("avatar", time().$request->cover_image->getClientOriginalName());
        }
        return redirect(route("companies.show", $company));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back();
    }

    private function validateCompany()
    {
        return \request()->validate([
            "user_id" => "required|numeric|min:0",
            "country_id" => "required|numeric|min:0",
            "city_id" => "required|numeric|min:0",
            "number_of_employee_id" => "required|numeric|min:0",
            "industry_category_id" => "required|numeric|min:0",
            "name" => "required|max:128",
            "url" => "required|url",
            "about" => "required",
            "founded_date" => "required|date",
            "logo" => "nullable|image|max:220",
            "cover_image" => "nullable|image|max:220"
        ]);
    }
}
