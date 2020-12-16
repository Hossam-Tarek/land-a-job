@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section("content")
    <div class="mt-5">
        <div class="col-8 offset-2 pt-3 ">
            <div class="card my-5 ">
                <div class="card-header bg-secondary text-light">
                    <h4>Add language</h4>
                </div>
                <div class="card-body">

                <form action="{{ route("languages.store") }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control admin-input @error("name") is-invalid @enderror"
                               name="name" value="{{ old("name") }}">
                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-success">Add language</button>
                        <a class="btn btn-danger ml-2" href="{{route('languages.index')}}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
