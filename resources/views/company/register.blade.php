@extends("company.layouts.master")

@section("title", "Company edit profile")

@section("style-sheets")
<link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
<link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
@endsection

@section("content")
<!-- Loading Until Request Done -->
<div id="loading_untill_request_done">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>
<!-- End Loading Until Request Done -->

<div class="row w-75 mx-auto mt-3">
    <h1 class="text-center col-12 border-bottom mb-3">Register Company Profile</h1>
    <div class="col-sm-12">
        <form action='{{ route("company.store") }}' method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error(' name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">

                @error("name")
                <p class="help text-danger">{{ $errors->first("name") }}</p>
                @enderror
            </div>
            <input type="hidden" name="user_id">

            <div class="form-group mb-3">
                <label for="country">Country</label>
                <select name="country_id" id="country" class="custom-select">
                    <option selected>Choose a country</option>
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error("country_id")
                <p class="help text-danger">{{ $errors->first("country_id") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="city">City</label>
                <select name="city_id" id="city" class="custom-select">
                    <option selected>Choose a city</option>
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error("city_id")
                <p class="help text-danger">{{ $errors->first("city_id") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="industry-category">Industry Category</label>
                <select name="industry_category_id" id="industry-category" class="custom-select">
                    <option selected>Choose an industry category</option>
                    @foreach($industryCategories as $industryCategory)
                    <option {{(old("industry_category_id") == $industryCategory->id)? 'selected': ''}} value="{{ $industryCategory->id }}">{{ $industryCategory->name }}</option>
                    @endforeach
                </select>
                @error("industry_category_id")
                <p class="help text-danger">{{ $errors->first("industry_category_id") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="number-of-employees">Number Of Employees</label>
                <select name="number_of_employee_id" id="number-of-employees" class="custom-select">
                    <option selected>Choose a number of employees</option>
                    @foreach($numberOfEmployees as $numberOfEmployee)
                    <option {{(old("number_of_employee_id") == $numberOfEmployee->id)? 'selected': ''}}  value="{{ $numberOfEmployee->id }}">
                        {{ "From ".$numberOfEmployee->min." to ".$numberOfEmployee->max }}
                    </option>
                    @endforeach
                </select>
                @error("number_of_employee_id")
                <p class="help text-danger">{{ $errors->first("number_of_employee_id") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="founded-date" class="form-label">Founded date</label>
                <input type="date" name="founded_date" id="founded-date" class="form-control @error(" founded_date") is-invalid @enderror" value="{{ old('founded_date') }}">

                @error("founded_date")
                <p class="help text-danger">{{ $errors->first("founded_date") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="website">Website</label>
                <input type="url" name="url" id="website" placeholder="Website" class="form-control  @error(" url") is-invalid @enderror" value="{{ old('url')}}">

                @error("url")
                <p class="help text-danger">{{ $errors->first("url") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="about">About the company</label>
                <textarea name="about" id="about" cols="50" rows="5" placeholder="About the company" class="form-control @error(" about") is-invalid @enderror">{{ old("about") }}</textarea>

                @error("about")
                <p class="help text-danger">{{ $errors->first("about") }}</p>
                @enderror
            </div>

            <div class="form-group mb-3 text-center">
                <button type="submit" class="btn btn-success">Register company</button>
            </div>

            <input type="hidden" name="user_id" value="3">
        </form>
    </div>
</div>
@endsection


@section("scripts")
<script src="{{ asset('js/image-upload-with-preview.js') }}"></script>
<script src="{{ asset('js/corresponding-cities.js') }}"></script>
@endsection