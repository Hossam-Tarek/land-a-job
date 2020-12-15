@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3 pt-3 ">
                <div class="card ">
                    <div class="card-header bg-secondary text-light">
                        <h4 class="text-center">Edit jobTypes</h4>
                    </div>
        <div class="card-body">
            <form action="{{route('jobTypes.update',$jobtype)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="form-group text-center">
                    <label for="Name">jobType Name</label>
                    <input type="text" name='name' class="form-control w-75 offset-1 @error('name') error @enderror" value="{{$jobtype->name}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <div class="text-center">
                <button class="btn btn-success" type='submit'>Update jobType</button>
                <a class="btn btn-primary" href="{{route('jobTypes.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
