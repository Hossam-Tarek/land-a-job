@extends("user.layouts.master")

@section("title", "edit profile")

@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
@endsection

@section("content")
    <!-- Loading Until Request Done -->
    <div id="loading_untill_request_done">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- End Loading Until Request Done -->
    <div class="container">
        <div class="row mx-auto mt-3">
            <h1 class="text-center col-12 border-bottom mb-5 mt-0 pb-3">Edit Profile</h1>
            <section class="container edit-section">
                <div class="row mx-auto mb-5 justify-content-center">

                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="1">
                        <i class="fas fa-link"></i>
                        <p>Links</p>
                    </div>

                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="3">
                        <i class="fas fa-phone"></i>
                        <p>Phones</p>
                    </div>
                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="4">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Education</p>
                    </div>

                    <div class="col col-md-3 col-lg icon-content-container px-3 mb-3" data-index="2"
                         id="user-edit-profile">
                        <i class="fas fa-hotel"></i>
                        <p>Profile</p>
                    </div>

                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="5">
                        <i class="fas fa-award"></i>
                        <p>skills</p>
                    </div>

                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="6">
                        <i class="fas fa-briefcase"></i>
                        <p>Experience</p>
                    </div>
                    <div class="col col-md-3 col-lg icon-content-container user-edit-btn px-3 mb-3" data-index="7">
                        <i class="fas fa-certificate"></i>
                        <p>Certificates</p>
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
                                               placeholder="linkedin.com/in/username"
                                               value="{{ old('linkedin') ?? ($links['linkedin'] ?? "") }}">
                                        <input type="hidden" name="linkedin_id"
                                               value="{{ $links['linkedin_id'] ?? "" }}">
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
                                               placeholder="facebook.com/username"
                                               value="{{ old('facebook') ?? ($links['facebook'] ?? "") }}">
                                        <input type="hidden" name="facebook_id"
                                               value="{{ $links['facebook_id'] ?? "" }}">
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
                                               placeholder="twitter.com/username"
                                               value="{{ old('twitter') ?? ($links['twitter'] ?? "") }}">
                                        <input type="hidden" name="twitter_id" value="{{ $links['twitter_id'] ?? "" }}">
                                    </div>
                                    @error("twitter")
                                    <p class="help text-danger">{{ $errors->first("twitter") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fab fa-instagram"></i></div>
                                        </div>
                                        <input type="url" name="instagram"
                                               class="form-control @error('instagram') is-invalid @enderror"
                                               placeholder="instagram.com/username"
                                               value="{{ old('instagram') ?? ($links['instagram'] ?? "") }}">
                                        <input type="hidden" name="instagram_id"
                                               value="{{ $links['instagram_id'] ?? "" }}">
                                    </div>
                                    @error("instagram")
                                    <p class="help text-danger">{{ $errors->first("instagram") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fab fa-behance"></i></div>
                                        </div>
                                        <input type="url" name="behance"
                                               class="form-control @error('behance') is-invalid @enderror"
                                               placeholder="behance.net/username"
                                               value="{{ old('behance') ?? ($links['behance'] ?? "") }}">
                                        <input type="hidden" name="behance_id" value="{{ $links['behance_id'] ?? "" }}">
                                    </div>
                                    @error("behance")
                                    <p class="help text-danger">{{ $errors->first("behance") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fab fa-github"></i></div>
                                        </div>
                                        <input type="url" name="github"
                                               class="form-control @error('github') is-invalid @enderror"
                                               placeholder="github.com/username"
                                               value="{{ old('github') ?? ($links['github'] ?? "") }}">
                                        <input type="hidden" name="github_id" value="{{ $links['github_id'] ?? "" }}">
                                    </div>
                                    @error("github")
                                    <p class="help text-danger">{{ $errors->first("github") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fab fa-stack-overflow"></i></div>
                                        </div>
                                        <input type="url" name="stackoverflow"
                                               class="form-control @error('stackoverflow') is-invalid @enderror"
                                               placeholder="stackoverflow.com/users/id"
                                               value="{{ old('stackoverflow') ?? ($links['stackoverflow'] ?? "") }}">
                                        <input type="hidden" name="stackoverflow_id"
                                               value="{{ $links['stackoverflow_id'] ?? "" }}">
                                    </div>
                                    @error("stackoverflow")
                                    <p class="help text-danger">{{ $errors->first("stackoverflow") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fab fa-youtube"></i></div>
                                        </div>
                                        <input type="url" name="youtube"
                                               class="form-control @error('youtube') is-invalid @enderror"
                                               placeholder="youtube.com/username"
                                               value="{{ old('youtube') ?? ($links['youtube'] ?? "") }}">
                                        <input type="hidden" name="youtube_id" value="{{ $links['youtube_id'] ?? "" }}">
                                    </div>
                                    @error("youtube")
                                    <p class="help text-danger">{{ $errors->first("youtube") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fas fa-blog"></i></div>
                                        </div>
                                        <input type="url" name="blog"
                                               class="form-control @error('blog') is-invalid @enderror"
                                               placeholder="Your blog"
                                               value="{{ old('blog') ?? ($links['blog'] ?? "") }}">
                                        <input type="hidden" name="blog_id" value="{{ $links['blog_id'] ?? "" }}">
                                    </div>
                                    @error("blog")
                                    <p class="help text-danger">{{ $errors->first("blog") }}</p>
                                    @enderror

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text w-100 justify-content-center"><i
                                                    class="fas fa-globe"></i></div>
                                        </div>
                                        <input type="url" name="website"
                                               class="form-control @error('website') is-invalid @enderror"
                                               placeholder="Your personal website"
                                               value="{{ old('website') ?? ($links['website'] ?? "") }}">
                                        <input type="hidden" name="website_id" value="{{ $links['website_id'] ?? "" }}">
                                    </div>
                                    @error("website")
                                    <p class="help text-danger">{{ $errors->first("website") }}</p>
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
                                <form action='{{ route("user.update", $user) }}' method="POST">
                                    @csrf
                                    @method("PUT")

                                    <div class="form-group mb-3">
                                        <label for="name">First name</label>
                                        <input type="text" name="first_name" id="name"
                                               class="form-control @error('first_name') is-invalid @enderror"
                                               value="{{ old('first_name') ?? $user->first_name }}"
                                               placeholder="First name">

                                        @error("first_name")
                                        <p class="help text-danger">{{ $errors->first("first_name") }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name">Last name</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('last_name') is-invalid @enderror"
                                               value="{{ old('last_name') ?? $user->last_name }}"
                                               placeholder="Last name">

                                        @error("last_name")
                                        <p class="help text-danger">{{ $errors->first("last_name") }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Edit phones section -->
                        <div style="display: none;">
                            <div class="col-12">
                                <form action='{{ route("user.phone.update") }}' method="POST">
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
                                        <p class="text-danger">{{ $errors->first("edited_number") }}</p>
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
                                <form action='{{ route("user.phone.add") }}' method="POST" id="add-phone-form">
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
                                        <p class="text-danger">{{ $errors->first("new_number") }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success" id="add-new-phone"
                                            form="add-phone-form">
                                        Add phone
                                    </button>
                                </form>
                                <form action='{{ route("user.phone.delete", 0) }}' method="POST"
                                      id="delete-phone-form">
                                    @csrf
                                    @method("delete")
                                </form>
                                <a href="javascript:" class="btn btn-primary" id="show-add-new-phone">Add phone</a>
                            </div>
                        </div>

                        <!-- Edit education section -->
                        <div style="display: none;">
                            <div class="col-sm-12">
                                Education
                            </div>
                        </div>

                        <!-- Edit skills section -->
                        <div style="display: none;">
                            <div class="col-sm-12">
                                Skills
                            </div>
                        </div>

                        <!-- Edit experience section -->
                        <div style="display: none;">
                            <div class="col-sm-12">
                                Experience
                            </div>
                        </div>

                        <!-- Edit certificates section -->
                        <div style="display: none;">
                            <div class="col-sm-12">
                                Certificates
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@section("scripts")
    <script src="{{ asset('js/image-upload-with-preview.js') }}"></script>
    <script src="{{ asset('js/corresponding-cities.js') }}"></script>
    <script src="{{ asset('js/user/edit-user-profile.js') }}"></script>
@endsection
