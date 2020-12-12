@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Edit company</h1>

                <form action="{{ route("companies.update", $company) }}" method="POST">
                    @csrf
                    @method("PUT")

                    {{-- TODO: Add a new user for the company --}}

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error("name") is-invalid @enderror"
                               value="{{ old("name") ?? $company->name }}" placeholder="Name">

                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <select name="country_id" id="country">
                            <option selected>Choose a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ (old("country_id") ?? $company->country->id) == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error("country_id")
                        <p class="help text-danger">{{ $errors->first("country_id") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <select name="city_id" id="city">
                            <option selected>Choose a city</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"
                                    {{ (old("city_id") ?? $company->city->id) == $city->id ? "selected" : "" }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error("city_id")
                        <p class="help text-danger">{{ $errors->first("city_id") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <select name="industry_category_id" id="industry-category">
                            <option selected>Choose an industry category</option>
                            @foreach($industryCategories as $industryCategory)
                                <option value="{{ $industryCategory->id }}"
                                    {{ (old("industry_category_id") ?? $company->industryCategory->id) == $industryCategory->id ? "selected" : "" }}>{{ $industryCategory->name }}</option>
                            @endforeach
                        </select>
                        @error("industry_category_id")
                        <p class="help text-danger">{{ $errors->first("industry_category_id") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <select name="number_of_employee_id" id="number-of-employees">
                            <option selected>Choose a number of employees</option>
                            @foreach($numberOfEmployees as $numberOfEmployee)
                                <option value="{{ $numberOfEmployee->id }}"
                                    {{ (old("number_of_employee_id") ?? $company->numberOfEmployee->id) == $numberOfEmployee->id ? "selected" : "" }}>
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
                        <input type="date" name="founded_date" id="founded-date"
                               class="form-control @error("founded_date") is-invalid @enderror"
                               value="{{ old("founded_date") ?? $company->founded_date }}">

                        @error("founded_date")
                        <p class="help text-danger">{{ $errors->first("founded_date") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="website">Website</label>
                        <input type="url" name="url" id="website" placeholder="Website"
                               class="form-control  @error("url") is-invalid @enderror"
                               value="{{ old("url") ?? $company->url }}">

                        @error("url")
                        <p class="help text-danger">{{ $errors->first("url") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="about">About the company</label>
                        <textarea name="about" id="about" cols="50" rows="5"
                                  placeholder="About the company"
                                  class="form-control @error("about") is-invalid @enderror"
                        >{{ old("about") ?? $company->about }}</textarea>

                        @error("about")
                        <p class="help text-danger">{{ $errors->first("about") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" id="logo" name="logo"
                               class="form-control-file @error("logo") is-invalid @enderror"
                               value="{{ old("logo") ?? $company->logo }}">

                        @error("logo")
                        <p class="help text-danger">{{ $errors->first("logo") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="cover-image" class="form-label">Cover image</label>
                        <input type="file" id="cover-image" name="cover_image"
                               class="form-control-file @error("cover_image") is-invalid @enderror"
                               value="{{ old("cover_image") ?? $company->cover_image }}">

                        @error("cover_image")
                        <p class="help text-danger">{{ $errors->first("cover_image") }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" name="submit"
                               value="Edit company">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
