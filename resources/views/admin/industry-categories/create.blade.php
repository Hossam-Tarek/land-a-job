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
                                <h4>Add industry category</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route("industry-categories.store") }}" method="POST">
                                    @csrf

                                    <div class="form-group mb-3 ">
                                        <input type="text" name="name" id="name"
                                               class="form-control admin-input @error("name") is-invalid @enderror"
                                               value="{{ old("name") }}">

                                        @error("name")
                                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                                        @enderror
                                    </div>
                                        <button type="submit" class="btn btn-success ">Add industry category</button>
                                        <a href="{{ route('industry-categories.index') }}" class="btn btn-danger ml-2">Cancel</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection











