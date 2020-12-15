@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
    <h1 class="text-center">Edit {{$jobTitle->title}}</h1>
<div class="container col-sm-6">
    <form action="{{route('job-titles.update',$jobTitle->id)}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='title' value="{{$jobTitle->title}}">
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <select name="industry_category_id" class="form-control">
                @foreach($industry as $ind)
                    <option value="{{$ind->id}}">{{$ind->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection
