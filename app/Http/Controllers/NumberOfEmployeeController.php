<?php

namespace App\Http\Controllers;

use App\Models\NumberOfEmployee;
use Illuminate\Http\Request;
use function Couchbase\basicDecoderV1;

class NumberOfEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("number-of-employees.index", ["numberOfEmployees" => NumberOfEmployee::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("number-of-employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfEmployee::create($this->validateNumberOfEmployees());
        return redirect(route("number-of-employees.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberOfEmployee  $numberOfEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfEmployee $numberOfEmployee)
    {
        return view("number-of-employees.show", compact("numberOfEmployee"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumberOfEmployee  $numberOfEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfEmployee $numberOfEmployee)
    {
        return view("number-of-employees.edit", compact("numberOfEmployee"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberOfEmployee  $numberOfEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfEmployee $numberOfEmployee)
    {
        $numberOfEmployee->update($this->validateNumberOfEmployees());
        return redirect(route("number-of-employees.show", $numberOfEmployee));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberOfEmployee  $numberOfEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfEmployee $numberOfEmployee)
    {
        $numberOfEmployee->delete();
        return back();
    }

    private function validateNumberOfEmployees()
    {
        return \request()->validate([
            "min" => "required|numeric|min:0",
            "max" => "required|numeric|min:50"
        ]);
    }
}
