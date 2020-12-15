@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
            <div class="col-6 mx-auto pt-5">
                <div class="card ">
                    <div class="card-header bg-secondary text-light">
                        <h4 class="text-center">Edit Career Levels</h4>
                    </div>
        <div class="card-body">
            <form action="{{route('careerLevels.update',$careerLevel)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="Name" class="offset-3">Country Name</label>
                    <input type="text" name='name' class="form-control w-50 h-25 mx-auto @error('name') error @enderror" value="{{$careerLevel->name}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <button class="btn btn-warning" type='submit'>Update careerLevels</button>
                <a class="btn btn-primary " href="{{route('careerLevels.index')}}">Cancel</a>
            </form>
        </div>
    </div>
    </div>
@endsection
