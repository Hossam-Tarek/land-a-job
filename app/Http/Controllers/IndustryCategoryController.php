<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryCategoryRequest;
use App\Models\IndustryCategory;

class IndustryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.industry-categories.index", ["industryCategories" => IndustryCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.industry-categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryCategoryRequest $request)
    {
        $request->validate([
            'name'=>'unique:industry_categories'
        ]);
        IndustryCategory::create($request->all());
        return redirect(route("industry-categories.index"))
            ->with(session()->flash('success','Industry Category is created successfully .'));;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IndustryCategory $industryCategory)
    {
//        return view("admin.industry-categories.show", compact("industryCategory"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustryCategory $industryCategory)
    {
        return view("admin.industry-categories.edit", compact("industryCategory"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(IndustryCategoryRequest $request, IndustryCategory $industryCategory)
    {
        if (IndustryCategory::where('name', $request->name)->where('id', '!=', $industryCategory->id)->count() == 0) {
            IndustryCategory::where('id', $industryCategory->id)->update(['name' => $request->name]);
             return redirect()->route('industry-categories.index')
                        ->with(session()->flash('success','Industry category is Updated successfully .'));
        }
        else{
            $err['name']='This is already exist';
            return redirect()->back()->withErrors($err)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndustryCategory $industryCategory)
    {
        $industryCategory->delete();
        return back()
            ->with(session()->flash('success','Industry category is Deleted successfully .'));;;
    }
}
