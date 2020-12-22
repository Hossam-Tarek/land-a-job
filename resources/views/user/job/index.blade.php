@extends("user.layouts.master")

@section("title", "Land a job")

@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link rel="stylesheet" href="{{asset('css/user/jobSearch.css')}}">
@endsection

@section("content")
    <!-- Loading old filtration loaded -->
    <div id="loading_untill_request_done">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!-- End Loading old filtration loaded -->

    <div class="container">
        <div class="row mt-3">
            {{--<!-- Show filter button in small screens -->--}}
            <div
                class="bg-dark rounded row justify-content-center align-items-center text-white d-sm-none show-filter-in-small-screen mb-2 py-1 text-center offset-3 col-6">
                Show filters <i class="ml-2 fas fa-filter"></i>
            </div>
            {{--<!-- End of Show filter button in small screens -->--}}

            {{--<!-- Filter section -->--}}
            <div class="col-md-3 col-12 px-2 display-sm-none filter-section no-select">
                <div class="p-2 bg-white mx-0 border-small-rounded">

                    {{--<!-- number of selected filters -->--}}
                    <div class="filter-container py-2 px-1 font-weight-bold">
                        Filters
                        <p class="text-muted font-weight-normal m-0 ml-3"><span class="mr-2"
                                                                                id="filters-selected">0</span>filters
                            selected
                        </p>
                    </div>
                    {{--<!-- End number of selected filters -->--}}
                    {{--<!-- Country filter -->--}}
                    @if(count($countries) > 0)
                        <div class="filter-container py-2" id="countries-filter-container">
                            <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                                <span class="d-block font-weight-bold">Country</span>
                                <i class="d-block fas fa-angle-down"></i>
                            </div>
                            <div class="filter-body row px-1 mx-0">
                                <input type="text" name='name' class="col-12 form-control filter-search-input"
                                       placeholder="Country">

                                <div class="form-check py-1 ml-3 col-12">
                                    <input class="form-check-input filter-checkbox-input all-check" type="checkbox"
                                           name="country-all"
                                           value="all"
                                           id="all-search-countries"
                                           @if(in_array('all', $filters->countries)) checked @endif>
                                    <label class="form-check-label filter-checkbox-label text-muted all-label"
                                           for="all-search-countries">All</label>
                                </div>

                                <!-- list countries -->
                                @foreach($countries as $id => $name)
                                    <div
                                        class="form-check py-1 ml-3 col-12 @if($loop->index > 3) display-none @else d-block @endif">
                                        <input class="form-check-input filter-checkbox-input" type="checkbox"
                                               name="country-{{$id}}"
                                               value="{{$id}}"
                                               id="country-{{$id}}"
                                               @if(in_array($id, $filters->countries)) checked @endif>
                                        <label class="form-check-label filter-checkbox-label text-muted"
                                               for="country-{{$id}}">{{$name}}</label>
                                    </div>
                                @endforeach
                            <!-- End list countries -->

                                @if(count($countries) > 4)
                                    <a href="javascript:"
                                       class="d-block col-12 ml-3 pt-1 filtration-show-more show-more-action">Show
                                        more</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--<!-- City filter -->--}}
                    @if(count($cities) > 0)
                        <div class="filter-container py-2" id="cities-filter-container">
                            <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                                <span class="d-block font-weight-bold">City</span>
                                <i class="d-block fas fa-angle-down"></i>
                            </div>
                            <div class="filter-body row px-1 mx-0">
                                <input type="text" name='name' class="col-12 form-control filter-search-input"
                                       placeholder="City">

                                <div class="form-check py-1 ml-3 col-12">
                                    <input class="form-check-input filter-checkbox-input all-check" type="checkbox"
                                           name="city-all"
                                           value="all"
                                           id="all-search-cities" @if(in_array('all', $filters->cities)) checked @endif>
                                    <label class="form-check-label filter-checkbox-label text-muted all-label"
                                           for="all-search-cities">All</label>
                                </div>

                                <!-- list cities -->
                                @foreach($cities as $id => $name)
                                    <div
                                        class="form-check py-1 ml-3 col-12 @if($loop->index > 3) display-none @else d-block @endif">

                                        <input class="form-check-input filter-checkbox-input" type="checkbox"
                                               name="city-{{$id}}"
                                               value="{{$id}}"
                                               id="city-{{$id}}" @if(in_array($id, $filters->cities)) checked @endif>
                                        <label class="form-check-label filter-checkbox-label text-muted"
                                               for="city-{{$id}}">{{$name}}</label>
                                    </div>
                                @endforeach
                            <!-- End list cities -->

                                @if(count($cities) > 4)
                                    <a href="javascript:"
                                       class="d-block col-12 ml-3 pt-1 filtration-show-more show-more-action">Show
                                        more</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--<!-- Career level filter -->--}}
                    @if(count($careerLevels) > 0)
                        <div class="filter-container py-2" id="career-level-filter-container">
                            <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                                <span class="d-block font-weight-bold">Career level</span>
                                <i class="d-block fas fa-angle-down"></i>
                            </div>
                            <div class="filter-body row px-1 mx-0">
                                <input type="text" name='name' class="col-12 form-control filter-search-input"
                                       placeholder="Career level">

                                <div class="form-check py-1 ml-3 col-12">
                                    <input class="form-check-input filter-checkbox-input all-check" type="checkbox"
                                           name="career-level-all"
                                           value="all"
                                           id="all-career-levels"
                                           @if(in_array('all', $filters->careerLevel)) checked @endif>
                                    <label class="form-check-label filter-checkbox-label text-muted all-label"
                                           for="all-career-levels">All</label>
                                </div>

                                <!-- list career levels -->
                                @foreach($careerLevels as $id => $name)
                                    <div
                                        class="form-check py-1 ml-3 col-12 @if($loop->index > 3) display-none @else d-block @endif">
                                        <input class="form-check-input filter-checkbox-input" type="checkbox"
                                               name="career-level-{{$id}}"
                                               value="{{$id}}"
                                               id="career-level{{$id}}"
                                               @if(in_array($id, $filters->careerLevel)) checked @endif>
                                        <label class="form-check-label filter-checkbox-label text-muted"
                                               for="career-level{{$id}}">{{$name}}</label>
                                    </div>
                                @endforeach
                            <!-- End list career levels -->
                                @if(count($careerLevels) > 4)
                                    <a href="javascript:"
                                       class="d-block col-12 ml-3 pt-1 filtration-show-more show-more-action">Show
                                        more</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--<!-- Job category filter -->--}}
                    @if(count($jobCategories) > 0)
                        <div class="filter-container py-2" id="job-categories-filter-container">
                            <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                                <span class="d-block font-weight-bold">Job category</span>
                                <i class="d-block fas fa-angle-down"></i>
                            </div>
                            <div class="filter-body row px-1 mx-0">
                                <input type="text" name='name' class="col-12 form-control filter-search-input"
                                       placeholder="Job category">

                                <div class="form-check py-1 ml-3 col-12">
                                    <input class="form-check-input filter-checkbox-input all-check" type="checkbox"
                                           name="job-category-all"
                                           value="all"
                                           id="all-job-categories"
                                           @if(in_array('all', $filters->jobCategory)) checked @endif>
                                    <label class="form-check-label filter-checkbox-label text-muted all-label"
                                           for="all-job-categories">All</label>
                                </div>

                                <!-- list job categories -->
                                @foreach($jobCategories as $id => $name)
                                    <div
                                        class="form-check py-1 ml-3 col-12 @if($loop->index > 3) display-none @else d-block @endif">
                                        <input class="form-check-input filter-checkbox-input" type="checkbox"
                                               name="job-category-{{$id}}"
                                               value="{{$id}}"
                                               id="job-category{{$id}}"
                                               @if(in_array($id, $filters->jobCategory)) checked @endif>
                                        <label class="form-check-label filter-checkbox-label text-muted"
                                               for="job-category{{$id}}">{{$name}}</label>
                                    </div>
                                @endforeach
                            <!-- End list job categories -->

                                @if(count($countries) > 4)
                                    <a href="javascript:"
                                       class="d-block col-12 ml-3 pt-1 filtration-show-more show-more-action">Show
                                        more</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--<!-- Job type filter -->--}}
                    @if(count($jobTypes) > 0)
                        <div class="filter-container py-2" id="job-types-filter-container">
                            <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                                <span class="d-block font-weight-bold">Job type</span>
                                <i class="d-block fas fa-angle-down"></i>
                            </div>
                            <div class="filter-body row px-1 mx-0">
                                <input type="text" name='name' class="col-12 form-control filter-search-input"
                                       placeholder="Job type">

                                <div class="form-check py-1 ml-3 col-12">
                                    <input class="form-check-input filter-checkbox-input all-check" type="checkbox"
                                           name="job-type-all"
                                           value="all"
                                           id="all-job-types" @if(in_array('all', $filters->jobType)) checked @endif>
                                    <label class="form-check-label filter-checkbox-label text-muted all-label"
                                           for="all-job-types">All</label>
                                </div>

                                <!-- list job types -->
                                @foreach($jobTypes as $id => $name)
                                    <div
                                        class="form-check py-1 ml-3 col-12 @if($loop->index > 3) display-none @else d-block @endif">
                                        <input class="form-check-input filter-checkbox-input" type="checkbox"
                                               name="job-type-{{$id}}"
                                               value="{{$id}}"
                                               id="job-type{{$id}}"
                                               @if(in_array($id, $filters->jobType)) checked @endif>
                                        <label class="form-check-label filter-checkbox-label text-muted"
                                               for="job-type{{$id}}">{{$name}}</label>
                                    </div>
                                @endforeach
                            <!-- End list job types -->

                                @if(count($countries) > 4)
                                    <a href="javascript:"
                                       class="d-block col-12 ml-3 pt-1 filtration-show-more show-more-action">Show
                                        more</a>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{--<!-- Years of experience filter -->--}}
                    <div class="filter-container py-2" id="years-of-experience-filter-container">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Years of experience</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body px-1 mx-0">
                            <div class="row m-0">
                                <div class="col-6 p-1">
                                    <select class="custom-select years-experience-input"
                                            id="min-years-of-experience-filter">
                                        <option @if(!isset($filters->yearsOfExperience->min)) selected @endif disabled>
                                            Min
                                        </option>
                                        @foreach($jobsMinExperience as $jobMinExperience)
                                            <option
                                                @if(isset($filters->yearsOfExperience->min) && $filters->yearsOfExperience->min == $jobMinExperience->min_years_of_experience  ) selected
                                                @endif
                                                value="{{ $jobMinExperience->min_years_of_experience }}">{{ $jobMinExperience->min_years_of_experience }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 p-1">
                                    <select class="custom-select years-experience-input"
                                            id="max-years-of-experience-filter">
                                        <option @if(!isset($filters->yearsOfExperience->max)) selected @endif disabled>
                                            Max
                                        </option>
                                        @foreach($jobsMaxExperience as $jobMaxExperience)
                                            <option
                                                @if(isset($filters->yearsOfExperience->max) && $filters->yearsOfExperience->max == $jobMinExperience->max_years_of_experience  ) selected
                                                @endif
                                                value="{{ $jobMaxExperience->max_years_of_experience }}">{{ $jobMaxExperience->max_years_of_experience }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p class="text-danger mb-0 mt-1 d-none col-12">Min must be less than or equal max</p>
                        </div>
                    </div>

                    {{--<!-- Date posted filter -->--}}
                    <div class="filter-container py-2" id="date-posted-filter-container">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Date posted</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-radio-input all-check" type="radio"
                                       name="date-posted"
                                       id="all-date-posted" value="all" @if($filters->datePosted == 'all'))
                                       checked @endif>
                                <label class="form-check-label filter-checkbox-label all-label" for="all-date-posted">All</label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-radio-input" type="radio"
                                       name="date-posted"
                                       id="past-24-hours-date-posted" value="day" @if($filters->datePosted == 'day'))
                                       checked @endif>
                                <label class="form-check-label filter-checkbox-label"
                                       for="past-24-hours-date-posted">Past
                                    24 hours</label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-radio-input" type="radio"
                                       name="date-posted"
                                       id="past-week-date-posted" value="week" @if($filters->datePosted == 'week'))
                                       checked @endif>
                                <label class="form-check-label filter-checkbox-label" for="past-week-date-posted">Past
                                    week</label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-radio-input" type="radio"
                                       name="date-posted"
                                       id="past-month-date-posted" value="month" @if($filters->datePosted == 'month'))
                                       checked @endif>
                                <label class="form-check-label filter-checkbox-label" for="past-month-date-posted">Past
                                    month</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<!-- End of Filter section -->--}}

            {{--<!-- Search & job section -->--}}
            <div class="col-md-9 col-12 px-2 search-job-section">
                {{--<!-- Search section -->--}}
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <form action="{{route('job.search.index')}}" id="job-search-form" method='get'>
{{--                        @csrf--}}
                        <div class="form-group row m-0 justify-content-between position-relative">
                            <i class="fas fa-search fa-search-in-input position-absolute"></i>
                            <input type="text" name='q'
                                   class="form-control col-9 col-md-10 rounded-0 search-job-input"
                                   id="job-search-keyword"
                                   placeholder="Search job" value="{{$searchKeyword}}">
                            <input hidden name="filters" id="job-search-filters">
                            <button class="btn btn-primary rounded-0 col-3 col-md-2" id="job-search-button"
                                    type='submit'>Search
                            </button>
                            <p class="text-danger mb-0 mt-1 d-none col-12">Please write your search keywords.</p>
                            @if(count($jobs) !== 0) <a href="{{route('job.search.index')}}" class="mt-3 p-0 col-6"><i
                                    class="mr-2 fas fa-angle-left"></i>Back to all jobs</a> @endif
                            <p class="mt-3 mb-0 p-0 text-muted @if(count($jobs) === 0) col-12 @else col-6 @endif text-right">
                                <span>@if(count($jobs) === 0) 0 @else {{$jobsCount}} @endif</span> Jobs found</p>
                        </div>
                    </form>
                    @if(count($jobs) === 0)
                        <div class="row justify-content-center align-items-center">
                            <svg class="mt-4 mb-3" width="76" height="73" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path id="no-result-illustration_svg__a" d="M.427.861h63V63.86h-63z"></path>
                                    <path id="no-result-illustration_svg__c" d="M0 .234h19.953v19.958H0z"></path>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#8C99AA" d="M12.408 60.628l-1.4-1.648 9.602-8.162 1.399 1.648z"></path>
                                    <path
                                        d="M19.99 31.093C21.01 18.373 32.153 8.888 44.872 9.91c12.721 1.022 22.206 12.163 21.185 24.884-1.023 12.72-12.163 22.204-24.884 21.183-12.721-1.021-22.205-12.163-21.183-24.883m-7.286-.585C11.36 47.25 23.844 61.915 40.587 63.26c16.745 1.344 31.41-11.139 32.753-27.883C74.686 18.633 62.203 3.97 45.458 2.625 28.714 1.279 14.05 13.763 12.704 30.508"
                                        fill="#FFF"></path>
                                    <g transform="translate(11.096 .582)">
                                        <mask id="no-result-illustration_svg__b" fill="#fff">
                                            <use xlink:href="#no-result-illustration_svg__a"></use>
                                        </mask>
                                        <path
                                            d="M50.147 9.368a29.23 29.23 0 00-6.936-4.091l.832-1.998a31.44 31.44 0 017.451 4.396l-1.347 1.693zm4.993 5.059a29.815 29.815 0 00-2.528-2.865l1.527-1.533c.965.96 1.877 1.995 2.71 3.073l-1.709 1.325zM31.95 63.859c-.843 0-1.691-.033-2.546-.101-8.384-.674-16.007-4.572-21.462-10.98C2.49 46.373-.143 38.227.53 29.84c.674-8.387 4.574-16.008 10.979-21.462C17.917 2.924 26.076.292 34.447.964c2.116.172 4.213.552 6.233 1.134l-.599 2.078a29.562 29.562 0 00-5.807-1.054C18.135 1.795 3.982 13.89 2.688 30.012 2.059 37.824 4.51 45.41 9.59 51.376c5.078 5.968 12.176 9.597 19.986 10.224 16.14 1.317 30.294-10.767 31.59-26.89.505-6.295-.983-12.45-4.303-17.8l1.84-1.14c3.564 5.745 5.162 12.356 4.62 19.113C62 51.34 48.183 63.857 31.949 63.859z"
                                            fill="#8C99AA" mask="url(#no-result-illustration_svg__b)"></path>
                                    </g>
                                    <path fill="#DDE9F2" d="M18.428 61.977L8.362 70.535.58 61.379l10.066-8.557z"></path>
                                    <g transform="translate(0 51.063)">
                                        <mask id="no-result-illustration_svg__d" fill="#fff">
                                            <use xlink:href="#no-result-illustration_svg__c"></use>
                                        </mask>
                                        <path fill="#8C99AA" mask="url(#no-result-illustration_svg__d)"
                                              d="M9.183 20.193l-1.4-1.649 9.12-7.754-6.381-7.505L1.4 11.038 0 9.391 10.77.234l9.183 10.804z"></path>
                                    </g>
                                    <path fill="#8C99AA" d="M11.205 68.502l-8.162-9.6 1.647-1.4 8.163 9.6z"></path>
                                </g>
                            </svg>
                            <h4 class="col-12 text-center font-italic text-muted">No results found for the keyword <span
                                    class="text-dark d-block d-md-inline">"{{$searchKeyword}}"</span></h4>
                            <p class="text-center text-muted">Please check the spelling or use a general search
                                keyword</p>
                            <div class="col-12 text-center mb-2">
                                <a class="btn back-to-all-jobs-btn rounded-0"><i class="mr-1 fas fa-angle-left"></i>back
                                    to all jobs</a>
                            </div>
                        </div>
                    @endif
                </div>
                {{--<!-- End of Search section -->--}}

                {{--<!-- Jobs section -->--}}

                {{--<!-- list jobs -->--}}
                @foreach($jobs as $job)
                    <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                        <div class="row">
                            <div class="col-8 col-md-10">
                                <h5 class="font-weight-bold"><a href="">{{$job->title}}</a></h5>
                                <p class="text-dark">
                                    <span class="font-weight-bold d-block">{{$job->company->name}}</span>
                                    <span>{{$job->city->name}}</span>,
                                    <span>{{$job->country->name}}</span>
                                    {{-- <!-- Add 120 minutes because in cairo UTC+2 --> --}}
                                    <span
                                        class="ml-1 text-success">- {{str_replace('before', 'ago', \Illuminate\Support\Carbon::parse($job->created_at)->diffForHumans(\Illuminate\Support\Carbon::now()->addMinutes(120)))}}</span>
                                </p>
                                <p>
                                    <span
                                        class="job-type-job-description-section text-dark font-weight-bold px-2 py-1 rounded">{{$job->jobType->name}}</span>
                                </p>
                                <p class="text-muted font-weight-bold mb-1">
                                    <span>Experience {{$job-> min_years_of_experience}} - {{$job-> max_years_of_experience}},</span>
                                    <span class="ml-1">{{$job->industryCategory->name}},</span>
                                    <span class="ml-1">{{$job->careerLevel->name}}</span>
                                </p>
                                <p class="font-weight-bold">
                                    @foreach($job->skills as $skill)
                                        <span class="badge custom-badge bg-info">{{$skill->name}}</span>
                                    @endforeach
                                </p>
                            </div>
                            <div class="col-md-2 col-4 p-0 text-center">
                                @php
                                    $logo = $job->company->logo
                                @endphp
                                <a href="">
                                    <img
                                        src='@if(!empty($logo)) {{asset("avatar/$logo")}} @else {{asset("img/default-images/company-default-logo.png")}} @endif'
                                        alt="Company logo"
                                        class="img-job-description-section rounded">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--<!-- pagination links-->--}}
                <div class="d-flex justify-content-center">
                    {{ $jobs->links() }}
                </div>

                {{--<!-- End of list jobs -->--}}

                {{--<!-- Jobs section -->--}}

            </div>
            {{--<!-- End of Search & job section -->--}}
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset('js/user/jobSearch.js')}}"></script>
@endsection
