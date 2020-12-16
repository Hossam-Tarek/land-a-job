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
                        <h4>Add new city</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route("cities.store") }}" method="POST">
                            @csrf
                            <div class="form-group mb-3 mx-auto  ">
                                <label for="country">Country</label>
                                <select class="custom-select" name="country_id" id="country">
                                    <option selected>Choose a country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old("country_id") == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error("country_id")
                                <p class="help text-danger">{{ $errors->first("country_id") }}</p>
                                @enderror
                            </div>
                            <div class="form-group mx-auto ">
                                <label for="city">City</label>
                                <input type="text" class="form-control admin-input @error("name") is-invalid @enderror"
                                       name="name" value="{{ old("name") }}" id="city">
                                @error("name")
                                <p class="help text-danger">{{ $errors->first("name") }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Add city</button>
                            <a href="{{route('cities.index') }}" class="btn btn-danger ml-3">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection











