@extends('user.layouts.master')

@section("title", "Land a job")
@section('style-sheets')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection


@section('content')
    <div class="container my-5">
        <div class="row">
             <div class="col-sm-8" > {{--Parent Div => Left Div --}}
                @if (Auth::user()->jobs->contains($job))
                    <div class="row bg-white bord mb-4">
                        <div class="col-12">

                            <div class="alert alert-success m-4">
                                You <b>Successfully applied </b> To This Job
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <h5 class="">Application status :
                                        @if (Auth::user()->jobs()->where('job_id',$job->id)->first()->pivot->status == 'Applied')
                                           <b> Not View Yet</b>
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-md-6 text-center">
                                    <h4 class="">
                                        <a href="{{--{{route('company.job.users',$job->id)}}--}}">(Mannage Application)</a>
                                   </h4>
                                </div>
                                <div class="col-md-12 text-secondary">
                                    <h5 class="p-3 m-2">Note: <b>Never Make any Kind of payment or Mony Transfer To employee</b>
                                        for vises Exam or any other purposes.We do our best to review every company on our platform.
                                        but if you suspect any fraud <a href="">please let us know </a>immedatley
                                    </h5>
                                </div>

                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-md-6 col-sm-12">
                                                <a href="" class="btn btn-primary my-3 w-75">See Similar Jobs</a>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <a href="" class="btn btn-secondary my-3 w-75">Search New job</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif



                <div class="row p-5 bg-white bord">
                    <div class="col-8 ">
                        <h3>{{$job->title}}</h3>
                        <h3 class="text-primary">{{$job->company->name}}</h3>
                        <h6>{{$job->country->name}}</h6>

                       @if (!Auth::user()->jobs->contains($job))
                        <form action="{{route('user.apply-job',$job)}}" method="POST">
                            @csrf
                            <button id="applied" class="btn btn-success mt-5 w-75 p-2 ">Apply For Job</button>
                        </form>
                       @endif


                    </div>
                    <div class="col-4">
                        <img src="{{asset('avatar/'.$job->company->logo)}}" alt="Not Yet " class="logo mb-4">
                        <h5 class="mt-3">{{$job->users->count()}} Applicants for 1 open Position</h5>
                    </div>
                </div>

                <div class="row p-5 bg-white my-3 bord">
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

                <div class="row p-5 bg-white my-3 bord">
                    <div class="">
                        <h3 class="">Job Categories:</h3>
                        <h5>{{$job->industryCategory->name}}</h5>
                    </div>
                </div>

                <div class="row p-5 bg-white my-3 bord">
                    <div class="">
                        <h3 class="">About The Job</h3>
                        <ul>
                            @foreach ($descriptions as $item)
                                @if($item != '')
                                    <Li>{{$item}}</Li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row p-5 bg-white my-3 bord">
                    <div class="">
                        <h3 class="">Job Requirements</h3>
                        <p class="text-secondary"> {{$job->requirements}}</p>
                    </div>
                </div>

                <div class="row p-5 bg-white my-3 bord">
                    <div>
                        <h3 class="mb-5 ">Key Words</h3>
                        @foreach ($job->skills as $skill)
                            <a class="btn btn-primary m-2 ">{{$skill->name}}</a>
                        @endforeach
                    </div>
                </div>

             </div>


            <div class="col-lg-4 col-sm-12">{{--Parent Div => Right Div --}}
                <div class="p-5 bg-white bord">
                    <h3 class="">About {{$job->company->name}}</h3>
                    <p class="">{{$job->company->about}}</p>
                </div>

                <div class="bg-white p-4 my-3 bord">
                    <h3 class="my-4"> Similar Jobs</h3>
                    @foreach ($related as $item)
                        <h3 class="text-secondary ">{{$item->title}}</h3>
                        <a href="{{route('company.profile')}}" class="text-primary">{{$item->company->name}}</a>
                        <h6 >{{$item->city->name}}</h6>
                        <hr>
                    @endforeach
               </div>

            </div>

        </div>
    </div>
@endsection

@section("scripts")
<script src="{{asset('js/user/main.js')}}"></script>
@endsection


