<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.showusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.createuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $name=time().request()->image->getClientOriginalName();
        request()->image->move('avatar',$name);
        $image=($name);
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $password=$request['last_name'];
        $email=$request['email'];

        User::create([
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "password"=>$password,
            "email"=>$email,
            "image"=>$image
        ]);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.showsingleuser',["user"=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.editusers',["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {



//        $image=request()->image;
        $name=time().request()->image->getClientOriginalName();
        request()->image->move('avatar',$name);
        $image=($name);


        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $password=$request['last_name'];
        $email=$request['email'];

        $user->update([
            "first_name"=>$first_name,
            "last_name"=>$last_name,
            "password"=>$password,
            "email"=>$email,
            "image"=>$image
        ]);
        return redirect()->route('users.index',$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
