@extends('admin.layouts.master')
@section('title','Reset password')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/reset-passord.css')}}">
@endsection
@section('content')
<div class="mt-4 p-4 offset-md-3 col-md-6">
    <div class="card my-5 ">
        <div class="card-header bg-secondary text-light">
            <h4>Reset password</h4>
        </div>
        <div class="card-body">
            <form action="{{route('password.update')}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="password">New password</label>
                    <input type="password" name='password' class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <li class="text-danger">{{$message}}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm password</label>
                    <input type="password" name='password_confirmation' class="form-control">
                </div>
                <button class="btn btn-success" type='submit'>Reset password</button>
                <a class="btn btn-danger ml-2" href="{{route('admin.index')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
