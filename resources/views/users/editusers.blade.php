@extends('layouts.app')
@section('content')
<h1 class="text-center">Edit User</h1>
<div class="container col-sm-6">
    <form action="{{route('users.update',$user['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group ">
            <label >First_Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp"  name='first_name'  value="{{ $user->first_name}}">
            @error('first_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Last_Name</label>
            <input type="text" class="form-control" name='last_name'  value="{{$user->last_name}}">
            @error('last_name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label >Email</label>
            <input type="email" class="form-control" name='email'  value="{{$user->email}}">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name='password'  value="{{$user->password}}">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label >Confirm_Password</label>
            <input type="password" class="form-control" name='password'  value="{{$user->password}}">
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>


        <div class="form-group">
            <label >Add Image</label>
            <input type="file" class="form-control" name='image'  value="{{$user->image}}">
            @error('image')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
