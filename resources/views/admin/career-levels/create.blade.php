@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div>
<div class="row">
    <div class="col-lg-2 col-sm-12"></div>
    <div class="col-lg-8 col-sm-12">
        <div class="card my-5">
            <div class="card-header bg-secondary text-light">
                <h4>Add new careerLevels</h4>
            </div>

            <div class="card-body">
                <form action="{{route('careerLevels.store')}}" method='post' enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="Name">careerLevel Name</label>
                        <input type="text" name='name' class="form-control admin-input @error('name') error @enderror" value="{{old('name')}}">
                        @error('name')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>
                    <a class="btn btn-success" >Add New CareerLevels</a>
                    <a class="btn btn-primary" href="{{route('careerLevels.index')}}">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
