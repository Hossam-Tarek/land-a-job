@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-8 offset-2 pt-3 ">
                <div class="card my-5 ">
                    <div class="card-header bg-secondary text-light">
                        <h4 >Add  jobTypes</h4>
                    </div>
        <div class="card-body">
            <form action="{{route('jobTypes.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group mx-auto">
                    <label for="Name ">jobType Name</label>
                    <input type="text" name='name' class="form-control admin-input  mx-auto @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Add New jobTypes</button>
                <a class="btn btn-primary" href="{{route('jobTypes.index')}}">Cancel</a>

            </form>
        </div>
    </div>

            </div>
        </div>
@endsection
