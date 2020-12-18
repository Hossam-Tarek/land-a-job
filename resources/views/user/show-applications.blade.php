@extends("user.layouts.master")

@section("title", "Land a job")

@section("style-sheets")
    <link rel="stylesheet" href="{{asset('css/application/application.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/user-application.css')}}">
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <span class="font-weight-bold application-text p-3" id="application-text">Applications <span>({{$jobs->count()}})</span></span>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col-sm-12 col-lg-7 jobs-container">
            @foreach($jobs as $job)
                <div class="application-container mb-3" data-id='{{$job->id}}'>
                    <div class="application pt-4 pb-3 pl-3 pr-3 position-relative" data-id='{{$job->id}}'>
                        <div class="position-absolute logo d-none d-md-block"><img src="{{ asset('img/8.jpg') }}" alt="" width="70px" height="70px"></div>

                        <div class="status pr-1 pl-1 mb-5 position-absolute">@if($job->status == 0) {{ "closed "}}@endif</div>
                        <p class="font-weight-bold job-title mt-3">{{$job->title}}</p>
                        <div>
                            <span class="company">{{$job->company->name}}-</span>
                            <span class="address">{{$job->city->name}},</span>
                            <span class="address">{{$job->country->name}}</span>
                        </div>
                        <div class="p-2 pivot-status mt-4">

                        <div class='job-status d-inline-block  applied p-0 m-0'>
                                <p class="status-text p-0 m-0 @if($job->pivot->status == 'Applied') {{ 'text-info font-weight-bolder' }} @endif ">Applied</p>
                                <div class="p-0 m-0">
                                    <div class="point d-inline-flex  p-0 m-0 @if($job->pivot->status == 'Applied') {{ 'active-point' }} @endif"></div>
                                    <div class="line d-inline-flex p-0 m-0  @if($job->pivot->status != 'Applied') {{ 'active-line' }} @endif"></div>
                                </div>
                                <p>{{$job->pivot->created_at->diffForHumans()}}</p>
                            </div>

                            <div class='job-status d-inline-block viewed p-0 m-0'>
                                <p class="status-text p-0 m-0  @if($job->pivot->status == 'Viewed') {{ 'text-secondary font-weight-bolder' }} @endif">@if($job->pivot->status != "Applied"){{"Viewed"}} @else {{"No action"}} @endif</p>
                                <div class="p-0 m-0">
                                    <div class="point d-inline-flex p-0 m-0  @if($job->pivot->status == 'Viewed') {{ 'active-point' }} @elseif($job->pivot->status != 'Applied' && $job->pivot->status != 'Viewed')) {{'point-access'}} @endif"></div>
                                    <div class="line d-inline-flex p-0 m-0  @if($job->pivot->status != 'Applied' && $job->pivot->status != 'Viewed') {{ 'active-line' }} @endif"></div>
                                </div>
                                <p class="ml-2 p-0 m-0">@if($job->pivot->status != "Applied"){{$job->pivot->updated_at->diffForHumans()}} @else {{"yet"}} @endif</p>
                            </div>

                            <div class='job-status d-inline-block other-status p-0 m-0'>
                                <p class="status-text p-0 m-0
                                @if($job->pivot->status == 'In consideration'){{ 'text-success font-weight-bolder'}} 
                                @elseif($job->pivot->status == 'Selected') {{'text-success font-weight-bolder'}} 
                                @elseif($job->pivot->status == 'Not selected') {{'text-danger font-weight-bolder'}} 
                                @endif">
                                @if($job->pivot->status != "Viewed" && $job->pivot->status != "Applied"){{$job->pivot->status}} @else {{"No action"}} @endif</p>
                                <div class="p-0 m-0">
                                    <div class="point d-inline-flex p-0 m-0 @if($job->pivot->status != 'Applied' && $job->pivot->status != 'Viewed') {{ 'active-point' }} @endif"></div>
                                </div>
                                <p class="ml-2">@if($job->pivot->status != "Viewed" && $job->pivot->status != "Applied"){{$job->pivot->updated_at->diffForHumans()}} @else {{"yet"}} @endif</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-6 col-lg-5 job-content">
            <div class="job-container">
            </div>
        </div>

        <div class="job d-none" id="job">
            <div class="applications_count-container pt-2 pb-2 pl-4 pr-4 mb-4">
                    <a href="" class="text-decoration-none job-show"><h1 class="font-weight-bolder job_title"></h1></a>
                    <span class="d-inline-block job-city"></span>
                    <span class="country d-inline-block font-weight-bolder"></span>
                    <p class="job-date"></p>
                    <div class="applications_statistic"> 
                        <ul class="list-unstyled p-1 applicants-count">
                            <ul class=" list-unstyled d-sm-block d-md-inline-block">
                                <li class=" applied-count align-middle p-0 d-inline-block"></li>
                                <li class="d-inline-block">
                                    <p class="m-0 applicant">Applicant</p>
                                    <p class="vacancy p-0 m-0">vacancies</p>
                                </li>
                            </ul>

                            <li class="border-right d-inline-block pr-2">
                                <p class="viewed-count m-0">1</p>
                                <p class="text-secondary p-0 m-0">Viewed</p>
                            </li>
                            <li class="border-right d-inline-block pr-2">
                                <p class="notselected-count m-0">2</p>
                                <p class="text-danger p-0 m-0">Not selected</p>
                            </li>
                            <li class="d-inline-block">
                                <p class="inconsediration-count m-0">3</p>
                                <p class="text-success p-0 m-0">in consediration</p>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>


@endsection
@section("scripts")
<script src="{{ asset('js/user/main.js') }}"></script>
@endsection
