@extends("company.layouts.master")

@section("title", "Single Jobs")

@section('style-sheets')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection


@section('content')
    <div class="container my-5">
        <div class="row">
             <div class="col-sm-8 col-md-12 col-lg-8" > {{--Parent Div => Left Div --}}

                <div class="row p-4 bg-white bord shadow-element">
                    <div class="col-md-6 ">
                        <h3 class="my-2">{{$job->title}}</h3>
                        <h3 class="text-primary my-3">{{$job->company->name}}</h3>
                        <h4 class="mb-4">{{$job->country->name}}</h4>
                        <h4 class="mb-4">{{$job->city->name}}</h4>
                        <a href="{{route('company.job.users',$job->id)}}" class="btn btn-primary p my-3 w-100 p-2 ">Applicants</a>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('avatar/'.$job->company->logo)}}" alt="Company Image" class="logo mb-4">
                        <h5 class="mt-3">{{$job->users ? $job->users->count() : 0}} Applicants for 1 open Position</h5>
                    </div>
                </div>


                <div class="row p-5 bg-white shadow-element my-3 bord">
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

                <div class="row p-5 bg-white my-3 shadow-element bord">
                    <div>
                        <h3>Job Categories:</h3>
                        <h5>{{$job->industryCategory->name}}</h5>
                    </div>
                </div>

                <div class="row p-5 bg-white shadow-element my-3 bord">
                        <h3 class="w-100">About The Job</h3>
                        <ul>
                            @foreach ($descriptions as $item)
                                @if($item != '')
                                    <Li>{{$item}}</Li>
                                @endif
                            @endforeach
                        </ul>
                </div>

                <div class="row p-5 shadow-element bg-white my-3 bord">
                    <div>
                        <h3>Job Requirements</h3>
                        <p class="text-secondary"> {{$job->requirements}}</p>
                    </div>
                </div>

                <div class="row p-5 shadow-element bg-white my-3 bord">
                    <div>
                        <h3 class="mb-5 ">Key Words</h3>
                        @foreach ($job->skills as $skill)
                            <a class="btn btn-primary m-2 ">{{$skill->name}}</a>
                        @endforeach
                    </div>
                </div>

             </div>


            <div class="col-lg-4 col-sm-12">{{--Parent Div => Right Div --}}
                <div class="p-5 bg-white shadow-element bord">
                    <h3>About {{$job->company->name}}</h3>
                    <p>{{$job->company->about}}</p>
                </div>

                <div class="bg-white p-4 shadow-element my-3 bord">
                    <h3 class="my-4"> Similar Jobs</h3>
                    @foreach ($related as $index=>$item)
                       <div class="row">
                       <div class="col-lg-8">
                            <h3 class="text-secondary ">{{$item->title}}</h3>
                            <a href="{{route('company.profile')}}" class="text-primary">{{$item->company->name}}</a>
                            <h6 >{{$item->city->name}}</h6>
                       </div>
                       <div class="col-lg-4 mt-0 pt-0 align-content-center justify-content-center d-flex">
                            <img src="{{asset('avatar/'.$item->company->logo)}}" alt="Company Image" class="related-logo">
                       </div>
                       </div>
                       @if ($index < $related->count() -1)
                            <hr class="my-4 mx-2">
                       @endif
                    @endforeach
               </div>

            </div>

        </div>
    </div>
@endsection
