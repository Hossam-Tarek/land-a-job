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
                        <h4>Edit Industry Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("industry-categories.update", $industryCategory) }}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="name" >Industry Category</label>
                                <input type="text" name="name" id="name"
                                       class="form-control admin-input @error("name") is-invalid @enderror"
                                       value="{{ old("name") ?? $industryCategory->name }}">

                                @error("name")
                                <p class="help text-danger">{{ $errors->first("name") }}</p>
                                @enderror
                            </div>
                                <button type="submit" class="btn btn-warning">Edit industry category</button>
                                <a href="{{ route('industry-categories.index') }}" class="btn btn-primary ml-3">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











