@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mx-auto ">
                <div class="card ">
                    <div class="card-header bg-secondary text-light">
                        <h4 class="text-center">Add Industry Category</h4>
                    </div>

                <form action="{{ route("industry-categories.update", $industryCategory) }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="form-group mb-3 ">
                        <label for="name" class="offset-3">Industry Category</label>
                        <input type="text" name="name" id="name"
                               class="form-control w-50 h-25 mx-auto @error("name") is-invalid @enderror"
                               value="{{ old("name") ?? $industryCategory->name }}">

                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Edit industry category</button>
                        <a href="{{ route('industry-categories.index') }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
