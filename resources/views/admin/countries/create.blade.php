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
            <h4>Add new Country</h4>
        </div>

        <div class="card-body">
            <form action="{{route('countries.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="Name">Country Name</label>
                    <input type="text" name='name' class="form-control  @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <div class="offset-4">
                <button class="btn btn-success" type='submit'>Add Country</button>
            <a class="btn btn-primary" href="{{route('countries.index')}}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
