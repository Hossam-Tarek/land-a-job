@extends("company.layouts.master")

@section("title", "Single Jobs")

@section('style-sheets')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection


@section('content')
    <div class="container my-5">
        <div class="row">
             <div class="col-sm-8" > {{--Parent Div => Left Div --}}

                <div class="row p-5 bg-white bord">
                    <div class="col-8 ">
                        <h3>{{$job->title}}</h3>
                        <h3 class="text-primary">{{$job->company->name}}</h3>
                        <h6>{{$job->country->name}}</h6>
                        <a href="{{route('all-jobs.create')}}" class="btn btn-success mt-5 w-75 p-2 ">Post a job Like This</a>
                    </div>
                    <div class="col-4">
                        <img src="{{asset('avatar/'.$job->company->logo)}}" alt="Not Yet " class="logo mb-4">
                        <h5 class="mt-3">{{$job->applications ? $job->applications->count() : 0}} Applicants for 1 open Position</h5>                    </div>
                </div>

                <div class="row p-5 bg-white my-5 bord">
                   <div class="container">
                        <div class="row text-center">
                            <div class="col-lg-4 col-sm-12">
                                <h4>Experience Needed</h4>
                                <span> {{$job->min_years_of_experience}} to {{$job->max_years_of_experience}}  years</span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <h4>Career Level:</h4>
                                <span>{{$job->careerLevel->name}}</span>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <h4>Job Type:</h4>
                                <span>{{$job->jobType->name}}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-lg-4">
                                <h4>Salary</h4>
                                <span>{{$job->max_salary}}</span>
                            </div>
                            <div class="col-lg-4">
                                <h4>Vacancies</h4>
                                <span>{{$job->vacancies}}</span>
                            </div>
                        </div>
                   </div>
                </div>

                <div class="row p-5 bg-white my-5 bord">
                    <div class="">
                        <h3 class="underline">Job Categories:</h3>
                        <h5>{{$job->industryCategory->name}}</h5>
                    </div>
                </div>

                <div class="row p-5 bg-white my-5 bord">
                    <div class="">
                        <h3 class="underline">About The Job</h3>
                        <ul>
                            @foreach ($descriptions as $item)
                                @if($item != '')
                                    <Li>{{$item}}</Li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row p-5 bg-white my-5 bord">
                    <div class="">
                        <h3 class="underline">Job Requirements</h3>
                        <p class="text-secondary"> {{$job->requirements}}</p>
                    </div>
                </div>

                <div class="row p-5 bg-white my-5 bord">
                    <div>
                        <h3 class="mb-5 underline">Key Words</h3>
                        @foreach ($job->skills as $skill)
                            <a class="btn btn-primary m-2 ">{{$skill->name}}</a>
                        @endforeach
                    </div>
                </div>

             </div>


            <div class="col-lg-4 col-sm-12">{{--Parent Div => Right Div --}}
                <div class="p-5 bg-white bord">
                    <h3 class="underline">About {{$job->company->name}}</h3>
                    <p class="">{{$job->company->about}}</p>
                </div>

                <div class="bg-white p-4 my-5 bord">
                    <h3 class="my-4"> Similar Jobs</h3>
                    @foreach ($related as $item)
                        <h3 class="text-secondary underline">{{$item->title}}</h3>
                        <a href="{{route('company.profile')}}" class="text-primary">{{$item->company->name}}</a>
                        <h6 >{{$item->city->name}}</h6>
                        <hr>
                    @endforeach
               </div>

            </div>

        </div>
    </div>
@endsection
