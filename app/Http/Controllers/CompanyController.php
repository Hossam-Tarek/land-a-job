<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\NumberOfEmployee;
use Illuminate\Http\Request;
use Validator;

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
    public function store(CompanyRequest $request)
    {
        Company::create($request->all());
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
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->all());
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

    public function updateLogo(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($logoValidation->passes()) {
            $request->logo->move("avatar", time() . $request->logo->getClientOriginalName());

            // return message
            return response()->json([
                'message'   => 'logo Uploaded Successfully',
                'class_name'  => 'alert alert-success',
                'status' => TRUE
            ]);
        } else {
            // return message
            return response()->json([
                'message'   => $logoValidation->errors()->all(),
                'class_name'  => 'alert alert-danger',
                'status' => False
            ]);
        }

        // Unlink old logo
        // $path = auth()->user()->
        // if($path)
            // unlink(public_path("avatar/".$path));
    }

    public function updateCoverImage(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'coverImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($logoValidation->passes()) {
            $request->coverImage->move("avatar", time() . $request->coverImage->getClientOriginalName());


            // return message
            return response()->json([
                'message'   => 'Cover image Uploaded Successfully',
                'class_name'  => 'alert alert-success',
                'status' => TRUE
            ]);
        } else {
            // return message
            return response()->json([
                'message'   => $logoValidation->errors()->all(),
                'class_name'  => 'alert alert-danger',
                'status' => False
            ]);
        }

        // Unlink old cover image
        // $path = auth()->user()->
        // if($path)
            // unlink(public_path("avatar/".$path));
    }
}
