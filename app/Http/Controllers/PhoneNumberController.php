<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('phone.show')->with('phones',PhoneNumber::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone.create')->with('users',User::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PhoneNumber::create($request->all());
        return redirect()->route('phones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneNumber $phoneNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone=PhoneNumber::find($id);
        //dd($phone);
        return view('phone.edit')->with('phone',$phone)
            ->with('users',User::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phone=PhoneNumber::find($id);
        $phone->update($request->all());
        return redirect()->route('phones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhoneNumber  $phoneNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone=PhoneNumber::find($id);
        $phone->delete();
        return redirect()->route('phones.index');


    }
}
