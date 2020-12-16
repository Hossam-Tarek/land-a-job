




@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-8 offset-2 pt-3 ">
                <div class="card my-5">
                    <div class="card-header bg-secondary text-light">
                        <h4>Add new JobTitle</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('job-titles.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label >Enter Name</label>
                                <input type="text" class="form-control admin-input"  name='title' >
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="industry_category_id" class="form-control admin-input">
                                    @foreach($industry as $ind)
                                        <option value="{{$ind->id}}">{{$ind->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                                <button class="btn btn-success  ">Add jobTitle</button>
                            <a href="{{route('job-titles.index') }}" class="btn btn-primary ml-3">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


