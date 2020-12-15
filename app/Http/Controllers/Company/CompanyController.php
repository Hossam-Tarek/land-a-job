<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use App\Models\Country;
use App\Models\IndustryCategory;
use App\Models\NumberOfEmployee;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware("company");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("company.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('Ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $company = Auth::user()->company;
        $phoneNumbers = Auth::user()->phoneNumbers;
        $links = Auth::user()->links;
        // dd($links);
        return view("company.show", compact("company", "links", "phoneNumbers"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = auth()->user()->company;
        return view("company.edit", [
            "user_id" => auth()->user()->id,
            "company" => $company,
            "countries" => Country::all(),
            "cities" => City::where('country_id',$company->country_id)->get(),
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
        return redirect(route("company.profile"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }


    public function updateLogo(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $logoName = time() . auth()->user()->id . '.' . $request->logo->getClientOriginalExtension();
        if ($logoValidation->passes()) {
            $request->logo->move("avatar", $logoName);

            // Unlink old logo
            $path = auth()->user()->company->logo;
            if ($path)
                unlink(public_path("avatar/" . $path));

            // Update logo in DB
            Company::where('user_id', auth()->user()->id)
                ->where('id', auth()->user()->company->id)
                ->update(['logo' => $logoName]);

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
    }

    public function updateCoverImage(Request $request)
    {
        // validation
        $logoValidation = Validator::make($request->all(), [
            'coverImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $coverImageName = time() . auth()->user()->id . '.' . $request->coverImage->getClientOriginalExtension();

        if ($logoValidation->passes()) {
            $request->coverImage->move("avatar", $coverImageName);

            // Unlink old coverImage
            $path = auth()->user()->company->cover_image;
            if ($path)
                unlink(public_path("avatar/" . $path));
            
            // Update coverImage in DB
            Company::where('user_id', auth()->user()->id)
                ->where('id', auth()->user()->company->id)
                ->update(['cover_image' => $coverImageName]);

            
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
    }
}
