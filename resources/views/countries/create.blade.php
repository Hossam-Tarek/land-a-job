@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Add new Country</h4>
        </div>

        <div class="card-body">
            <form action="{{route('countries.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="Name">Country Name</label>
                    <input type="text" name='name' class="form-control @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <button class="btn btn-success" type='submit'>Add Country</button>
            <a class="btn btn-primary" href="{{route('countries.index')}}">Cancel</a>

            </form>
        </div>
    </div>
@endsection
