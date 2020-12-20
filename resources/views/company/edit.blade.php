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

    <div class="row w-md-75 mx-auto mt-3">
        <h1 class="text-center col-12 border-bottom mb-5 mt-0 pb-3">Edit Profile</h1>
        <section class="container edit-section">
            <div class="row mx-auto mb-5">
                <div class="col-12 col-md-4 icon-content-container px-3 mb-3" data-index="1" id="company-edit-links">
                    <i class="fas fa-link"></i>
                    <p>Links</p>
                </div>
                <div class="col-12 col-md-4 icon-content-container px-3 mb-3" data-index="2" id="company-edit-profile">
                    <i class="fas fa-hotel"></i>
                    <p>Profile</p>
                </div>
                <div class="col-12 col-md-4 icon-content-container px-3 mb-3" data-index="3" id="company-edit-phones">
                    <i class="fas fa-phone"></i>
                    <p>Phones</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 edit-section-content">

                    <!-- Edit links section -->
                    <div style="display: none;">
                        <form action='{{ route("company.links.update") }}' method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group mb-3">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text w-100 justify-content-center"><i
                                                class="fab fa-linkedin-in"></i></div>
                                    </div>
                                    <input type="url" name="linkedin"
                                           class="form-control @error('linkedin') is-invalid @enderror"
                                           placeholder="Linkedin"
                                           value="{{ old('linkedin') ?? ($links['linkedin'] ?? "") }}">
                                    <input type="hidden" name="linkedin_id" value="{{ $links['linkedin_id'] ?? "" }}">
                                </div>
                                @error("linkedin")
                                <p class="help text-danger">{{ $errors->first("linkedin") }}</p>
                                @enderror

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text w-100 justify-content-center"><i
                                                class="fab fa-facebook-f"></i></div>
                                    </div>
                                    <input type="url" name="facebook"
                                           class="form-control @error('facebook') is-invalid @enderror"
                                           placeholder="Facebook"
                                           value="{{ old('facebook') ?? ($links['facebook'] ?? "") }}">
                                    <input type="hidden" name="facebook_id" value="{{ $links['facebook_id'] ?? "" }}">
                                </div>
                                @error("facebook")
                                <p class="help text-danger">{{ $errors->first("facebook") }}</p>
                                @enderror

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text w-100 justify-content-center"><i
                                                class="fab fa-twitter"></i></div>
                                    </div>
                                    <input type="url" name="twitter"
                                           class="form-control @error('twitter') is-invalid @enderror"
                                           placeholder="Twitter"
                                           value="{{ old('twitter') ?? ($links['twitter'] ?? "") }}">
                                    <input type="hidden" name="twitter_id" value="{{ $links['twitter_id'] ?? "" }}">
                                </div>
                                @error("twitter")
                                <p class="help text-danger">{{ $errors->first("twitter") }}</p>
                                @enderror

                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-warning">Edit links</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                            </div>
                        </form>

                    </div>

                    <!-- Edit Profile section -->
                    <div style="display: block;">
                        <div class="col-sm-12">
                            <form action='{{ route("company.update", $company) }}' method="POST">
                                @csrf
                                @method("PUT")

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') ?? $company->name }}" placeholder="Name">

                                    @error("name")
                                    <p class="help text-danger">{{ $errors->first("name") }}</p>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_id" value="{{ $user_id }}">

                                <div class="form-group mb-3">
                                    <label for="country">Country</label>
                                    <select name="country_id" id="country" class="custom-select">
                                        <option selected>Choose a country</option>
                                        @foreach($countries as $country)
                                            <option
                                                value="{{ $country->id }}" {{ (old("country_id")?? $company->country->id) == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
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
                                            <option
                                                value="{{ $city->id }}" {{ (old("city_id") ?? $company->city->id) == $city->id ? "selected" : "" }}>{{ $city->name }}</option>
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
                                            <option
                                                value="{{ $industryCategory->id }}" {{ (old("industry_category_id") ?? $company->industryCategory->id) == $industryCategory->id ? "selected" : "" }}>{{ $industryCategory->name }}</option>
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
                                            <option
                                                value="{{ $numberOfEmployee->id }}" {{ (old("number_of_employee_id") ?? $company->numberOfEmployee->id) == $numberOfEmployee->id ? "selected" : "" }}>
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
                                           class="form-control @error(" founded_date") is-invalid @enderror"
                                           value="{{ old("founded_date") ?? $company->founded_date }}">

                                    @error("founded_date")
                                    <p class="help text-danger">{{ $errors->first("founded_date") }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="website">Website</label>
                                    <input type="url" name="url" id="website" placeholder="Website"
                                           class="form-control  @error(" url") is-invalid @enderror"
                                           value="{{ old("url") ?? $company->url }}">

                                    @error("url")
                                    <p class="help text-danger">{{ $errors->first("url") }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="about">About the company</label>
                                    <textarea name="about" id="about" cols="50" rows="5" placeholder="About the company"
                                              class="form-control @error(" about") is-invalid @enderror">{{ old("about") ?? $company->about }}</textarea>

                                    @error("about")
                                    <p class="help text-danger">{{ $errors->first("about") }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-warning">Edit company</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Edit phones section -->
                    <div style="display: none;">
                        <div class="col-12">
                            <form action='{{ route("company.phone.update") }}' method="POST">
                                @csrf
                                @method("PUT")
                                <div class="form-group mb-3">
                                    <label for="phone-select">Phones</label>
                                    <select name="phone_id" id="phone-select" class="custom-select">
                                        <option selected disabled>Choose a phone</option>
                                        @foreach($phones as $phone)
                                            <option value="{{ $phone->id }}">{{ $phone->number }}</option>
                                        @endforeach
                                    </select>

                                    <div class="input-group my-3" id="edit-number-input-container">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="text" name="edited_number" id="edit-number-input"
                                               class="form-control @error('edited_number') is-invalid @enderror"
                                               placeholder="Number" value="{{ old('edited_number')}}">
                                    </div>
                                    @error("edited_number")
                                    <p class="help text-danger">{{ $errors->first("edited_number") }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 row justify-content-center" id="form-action-controller">
                                    <a href="javascript:" class="btn btn-primary" id="show-phone-edit-btn">Edit
                                        phone</a>
                                    <button type="submit" class="btn btn-warning" id="phone-edit-btn">Edit phone
                                    </button>
                                    <button href="{{route('company.phone.delete',1)}}" class="btn btn-danger ml-3"
                                            id="phone-delete-btn" form="delete-phone-form">Delete phone
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary ml-3">Cancel</a>
                                </div>
                            </form>
                            <form action='{{ route("company.phone.add") }}' method="POST" id="add-phone-form">
                                <div class="form-group mb-3">
                                    @csrf
                                    <div class="input-group my-3" id="new-number-input-container">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fas fa-phone"></i></div>
                                        </div>
                                        <input type="text" name="new_number"
                                               class="form-control @error('new_number') is-invalid @enderror"
                                               placeholder="Number" value="{{ old('new_number')}}">
                                    </div>
                                    @error("new_number")
                                    <p class="help text-danger">{{ $errors->first("new_number") }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success" id="add-new-phone" form="add-phone-form">
                                    Add phone
                                </button>
                                <a href="javascript:" class="btn btn-primary" id="show-add-new-phone">Add phone</a>
                            </form>
                            <form action='{{ route("company.phone.delete", 0) }}' method="POST" id="delete-phone-form">
                                @csrf
                                @method("delete")
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section("scripts")
    <script src="{{ asset('js/image-upload-with-preview.js') }}"></script>
    <script src="{{ asset('js/corresponding-cities.js') }}"></script>
    <script src="{{ asset('js/company/edit-company-profile.js') }}"></script>
@endsection
