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
        return view("industry-categories.index", ["industryCategories" => IndustryCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("industry-categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryCategoryRequest $request)
    {
        IndustryCategory::create($request);
        return redirect(route("industry-categories.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IndustryCategory $industryCategory)
    {
        return view("industry-categories.show", compact("industryCategory"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndustryCategory  $industryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustryCategory $industryCategory)
    {
        return view("industry-categories.edit", compact("industryCategory"));
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
        $industryCategory->update($request);
        return redirect(route("industry-categories.show", $industryCategory));
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
        return back();
    }
}
