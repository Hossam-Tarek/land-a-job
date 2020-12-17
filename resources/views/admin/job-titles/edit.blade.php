@extends('admin.layouts.master')
@section('title','Edit job title')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-8 offset-2 pt-3 ">
                <div class="card my-5">
                    <div class="card-header bg-secondary text-light">
                        <h4>Edit job title</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{route('job-titles.update',$jobTitle->id)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="industry-category">Industry category</label>
                                <select name="industry_category_id" class="form-control admin-input"id="industry-category">
                                    @foreach($industry as $ind)
                                        <option value="{{$ind->id}}">{{$ind->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job-title">Job title</label>
                                <input type="text" class="form-control admin-input"  aria-describedby="emailHelp" name='title' value="{{$jobTitle->title}}" id="job-title">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                                <button type="submit" class="btn btn-warning ">Edit job title</button>
                                <a href="{{route('job-titles.index') }}" class="btn btn-danger ml-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
