@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto ">
                <div class="card ">
                    <div class="card-header bg-secondary text-light">
                        <h4 class="text-center">Edit jobTitles</h4>
                    </div>
<div class="card-body">
    <form action="{{route('job-titles.update',$jobTitle->id)}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group  ">
            <label class="offset-1">Enter Name</label>
            <input type="text" class="form-control w-75 mx-auto"  aria-describedby="emailHelp" name='title' value="{{$jobTitle->title}}">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <select name="industry_category_id" class="form-control w-75  mx-auto">
                @foreach($industry as $ind)
                    <option value="{{$ind->id}}">{{$ind->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-75">Edit</button>
        </div>
    </form>
</div>
                </div>
            </div>
        </div>
    </div>
@endsection
