@extends("user.layouts.master")

@section("title", "Land a job")

@section("style-sheets")
    <link rel="stylesheet" href="{{asset('css/user/jobSearch.css')}}">
@endsection

@section("content")
    <div class="container">
        <div class="row mt-3">
            <!-- Show filter button in small screens -->
            <div
                class="bg-dark rounded row justify-content-center align-items-center text-white d-sm-none show-filter-in-small-screen mb-2 py-1 text-center offset-3 col-6">
                Show filters <i class="ml-2 fas fa-filter"></i>
            </div>
            <!-- End of Show filter button in small screens -->

            <!-- Filter section -->
            <div class="col-md-3 col-12 px-2 display-sm-none filter-section">
                <div class="p-2 bg-white mx-0 border-small-rounded">

                    <div class="filter-container py-2 px-1 font-weight-bold">
                        Filters
                        <p class="text-muted font-weight-normal m-0"><span class="mr-2">0</span>filters selected</p>
                    </div>

                    <!-- Country filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Country</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <input type="text" name='name' class="col-12 form-control filter-search-input"
                                   placeholder="Country">

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="all-search-countries">
                                <label class="form-check-label filter-checkbox-label"
                                       for="all-search-countries">All<span
                                        class="ml-1">(100)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="egypt">
                                <label class="form-check-label filter-checkbox-label" for="egypt">Egypt<span
                                        class="ml-1">(10)</span></label>
                            </div>

                            <a href="javascript:" class="d-block col-12 ml-3 pt-1">See more</a>
                        </div>
                    </div>

                    <!-- City filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">City</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <input type="text" name='name' class="col-12 form-control filter-search-input"
                                   placeholder="City">

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="all-search-cities">
                                <label class="form-check-label filter-checkbox-label" for="all-search-cities">All<span
                                        class="ml-1">(100)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="cairo">
                                <label class="form-check-label filter-checkbox-label" for="cairo">Cairo<span
                                        class="ml-1">(10)</span></label>

                            </div>
                            <a href="javascript:" class="d-block col-12 ml-3 pt-1">See more</a>
                        </div>
                    </div>

                    <!-- Career level filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Career level</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="all-career-levels">
                                <label class="form-check-label filter-checkbox-label" for="all-career-levels">All<span
                                        class="ml-2">(100)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="entry-level-career-level">
                                <label class="form-check-label filter-checkbox-label" for="entry-level-career-level">Entry
                                    Level<span class="ml-2">(10)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="experienced-career-level">
                                <label class="form-check-label filter-checkbox-label" for="experienced-career-level">Experienced<span
                                        class="ml-2">(10)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="manager-career-levels">
                                <label class="form-check-label filter-checkbox-label"
                                       for="manager-career-levels">Manager<span class="ml-2">(10)</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- Job category filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Job category</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <input type="text" name='name' class="col-12 form-control filter-search-input"
                                   placeholder="Job category">

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="all-job-categories">
                                <label class="form-check-label filter-checkbox-label" for="all-job-categories">All<span
                                        class="ml-1">(100)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="it-job-category">
                                <label class="form-check-label filter-checkbox-label" for="it-job-category">IT<span
                                        class="ml-1">(10)</span></label>
                            </div>
                            <a href="javascript:" class="d-block col-12 ml-3 pt-1">See more</a>
                        </div>
                    </div>

                    <!-- Job type filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Job type</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <input type="text" name='name' class="col-12 form-control filter-search-input"
                                   placeholder="Job type">

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="all-job-types">
                                <label class="form-check-label filter-checkbox-label" for="all-job-types">All<span
                                        class="ml-1">(100)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="checkbox" name="" value=""
                                       id="full-time-job-type">
                                <label class="form-check-label filter-checkbox-label" for="full-time-job-type">Full
                                    time<span class="ml-1">(10)</span></label>
                            </div>
                            <a href="javascript:" class="d-block col-12 ml-3 pt-1">See more</a>
                        </div>
                    </div>

                    <!-- Date posted filter -->
                    <div class="filter-container py-2">
                        <div class="row align-items-center justify-content-between px-1 mx-0 mb-2 filter-header">
                            <span class="d-block font-weight-bold">Date posted</span>
                            <i class="d-block fas fa-angle-down"></i>
                        </div>
                        <div class="filter-body row px-1 mx-0">
                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="radio" name="exampleRadios"
                                       id="all-date-posted" value="">
                                <label class="form-check-label filter-checkbox-label" for="all-date-posted">All<span
                                        class="ml-1">(10)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="radio" name="exampleRadios"
                                       id="past-24-hours-date-posted" value="">
                                <label class="form-check-label filter-checkbox-label" for="past-24-hours-date-posted">Past
                                    24 hours<span class="ml-1">(25)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="radio" name="exampleRadios"
                                       id="past-week-date-posted" value="">
                                <label class="form-check-label filter-checkbox-label" for="past-week-date-posted">Past
                                    week<span class="ml-1">(10)</span></label>
                            </div>

                            <div class="form-check py-1 ml-3 col-12">
                                <input class="form-check-input filter-checkbox-input" type="radio" name="exampleRadios"
                                       id="past-month-date-posted" value="">
                                <label class="form-check-label filter-checkbox-label" for="past-month-date-posted">Past
                                    month<span class="ml-1">(10)</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Filter section -->

            <!-- Search & job section -->
            <div class="col-md-9 col-12 px-2 search-job-section">
                <!-- Search section -->
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <form action="{{route('countries.update', 1)}}" method='post'>
                        @csrf
                        <div class="form-group row m-0 justify-content-between position-relative">
                            <i class="fas fa-search fa-search-in-input position-absolute"></i>
                            <input type="text" name='name'
                                   class="form-control col-9 col-md-10 rounded-0 search-job-input"
                                   placeholder="Search job">
                            <button class="btn btn-primary rounded-0 col-3 col-md-2" type='submit'>Search</button>
                            <a href="#" class="mt-3 p-0"><i class="mr-2 fas fa-angle-left"></i>Back to all jobs</a>
                            <p class="mt-3 mb-0 text-muted"><span>250</span> Jobs found</p>
                        </div>
                    </form>
                </div>
                <!-- End of Search section -->

                <!-- Jobs section -->

                <!-- Job -->
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <div class="row">
                        <div class="col-8 col-md-10">
                            <h5 class="font-weight-bold"><a href="">Full-stack developer</a></h5>
                            <p class="text-dark">
                                <span>Cairo</span>,
                                <span class="">Egypt</span>
                                <span class="ml-1 text-success">- 1 hour ago</span>
                            </p>
                            <p>
                                <span
                                    class="job-type-job-description-section text-dark font-weight-bold px-2 py-1 rounded">Full time</span>
                            </p>
                            <p class="text-muted font-weight-bold">
                                <span>Experience 1 - 3,</span>
                                <span class="ml-1">Information Technology (IT),</span>
                                <span class="ml-1">Experienced</span>
                            </p>
                        </div>
                        <div class="col-md-2 col-4 p-0 text-center">
                            <img src="{{asset('avatar/0b43d881a2abd5edbb7ec2c99dce24e1.png')}}" alt="Company logo"
                                 class="img-job-description-section rounded">
                        </div>
                    </div>
                </div>
                <!-- End of Job -->

                <!-- Job -->
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <div class="row">
                        <div class="col-8 col-md-10">
                            <h5 class="font-weight-bold"><a href="">Full-stack developer</a></h5>
                            <p class="text-dark">
                                <span>Cairo</span>,
                                <span class="">Egypt</span>
                                <span class="ml-1 text-success">- 1 hour ago</span>
                            </p>
                            <p>
                                <span
                                    class="job-type-job-description-section text-dark font-weight-bold px-2 py-1 rounded">Full time</span>
                            </p>
                            <p class="text-muted font-weight-bold">
                                <span>Experience 1 - 3,</span>
                                <span class="ml-1">Information Technology (IT),</span>
                                <span class="ml-1">Experienced</span>
                            </p>
                        </div>
                        <div class="col-md-2 col-4 p-0 text-center">
                            <img src="{{asset('avatar/0b43d881a2abd5edbb7ec2c99dce24e1.png')}}" alt="Company logo"
                                 class="img-job-description-section rounded">
                        </div>
                    </div>
                </div>
                <!-- End of Job -->

                <!-- Job -->
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <div class="row">
                        <div class="col-8 col-md-10">
                            <h5 class="font-weight-bold"><a href="">Full-stack developer</a></h5>
                            <p class="text-dark">
                                <span>Cairo</span>,
                                <span class="">Egypt</span>
                                <span class="ml-1 text-success">- 1 hour ago</span>
                            </p>
                            <p>
                                <span
                                    class="job-type-job-description-section text-dark font-weight-bold px-2 py-1 rounded">Full time</span>
                            </p>
                            <p class="text-muted font-weight-bold">
                                <span>Experience 1 - 3,</span>
                                <span class="ml-1">Information Technology (IT),</span>
                                <span class="ml-1">Experienced</span>
                            </p>
                        </div>
                        <div class="col-md-2 col-4 p-0 text-center">
                            <img src="{{asset('avatar/0b43d881a2abd5edbb7ec2c99dce24e1.png')}}" alt="Company logo"
                                 class="img-job-description-section rounded">
                        </div>
                    </div>
                </div>
                <!-- End of Job -->

                <!-- Job -->
                <div class="bg-white p-4 bg-white search-section border-small-rounded mb-3">
                    <div class="row">
                        <div class="col-8 col-md-10">
                            <h5 class="font-weight-bold"><a href="">Full-stack developer</a></h5>
                            <p class="text-dark">
                                <span>Cairo</span>,
                                <span class="">Egypt</span>
                                <span class="ml-1 text-success">- 1 hour ago</span>
                            </p>
                            <p>
                                <span
                                    class="job-type-job-description-section text-dark font-weight-bold px-2 py-1 rounded">Full time</span>
                            </p>
                            <p class="text-muted font-weight-bold">
                                <span>Experience 1 - 3,</span>
                                <span class="ml-1">Information Technology (IT),</span>
                                <span class="ml-1">Experienced</span>
                            </p>
                        </div>
                        <div class="col-md-2 col-4 p-0 text-center">
                            <img src="{{asset('avatar/0b43d881a2abd5edbb7ec2c99dce24e1.png')}}" alt="Company logo"
                                 class="img-job-description-section rounded">
                        </div>
                    </div>
                </div>
                <!-- End of Job -->

                <!-- Jobs section -->

            </div>
            <!-- End of Search & job section -->
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset('js/user/jobSearch.js')}}"></script>
@endsection
