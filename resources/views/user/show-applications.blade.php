@extends("user.layouts.master")

@section("title", "Land a job")

@section("style-sheets")
    <link rel="stylesheet" href="{{asset('css/application/application.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/user-application.css')}}">
@endsection

@section("content")
    <div class="row">
        <span class="font-weight-bold application-text p-3" id="application-text">Applications <span>({{$jobs->count()}})</span></span>
    </div>
    <div class="row pt-3">
        <div class="col-sm-10 col-lg-7 jobs-container">
            @foreach($jobs as $job)
                <div class="application-container mb-3" data-id='{{$job->id}}'>
                    <div class="application pt-4 pb-3 pl-3 pr-3 position-relative" data-id='{{$job->id}}'>
                        <div class="status pr-1 pl-1 mb-5 position-absolute">@if($job->status == 0) {{ "closed "}} @else {{ "open" }} @endif</div>
                        <p class="font-weight-bold job-title mt-3">{{$job->title}}</p>
                        <div>
                            <span class="company">{{$job->company->name}}-</span>
                            <span class="address">{{$job->city->name}},</span>
                            <span class="address">{{$job->country->name}}</span>
                        </div>
                        <div class="p-2 pivot-status mt-4">

                        <div class='job-status d-inline-block  applied p-0 m-0'>
                                <p class="status-text p-0 m-0 @if($job->pivot->status == 'Applied') {{ 'text-danger font-weight-bolder' }} @endif ">Applied</p>
                                <div class="p-0 m-0">
                                    <div class="point d-inline-flex  p-0 m-0 @if($job->pivot->status == 'Applied') {{ 'active-point' }} @endif"></div>
                                    <div class="line d-inline-flex p-0 m-0  @if($job->pivot->status != 'Applied') {{ 'active-line' }} @endif"></div>
                                </div>
                                <p>{{$job->pivot->created_at->diffForHumans()}}</p>
                            </div>

                            <div class='job-status d-inline-block viewed p-0 m-0'>
                                <p class="status-text p-0 m-0  @if($job->pivot->status == 'Viewed') {{ ' text-primary font-weight-bolder' }} @endif">@if($job->pivot->status != "Applied"){{"Viewed"}} @else {{"No action"}} @endif</p>
                                <div class="p-0 m-0">
                                    <div class="point d-inline-flex p-0 m-0  @if($job->pivot->status == 'Viewed') {{ 'active-point' }} @elseif($job->pivot->status != 'Applied' && $job->pivot->status != 'Viewed')) {{'point-access'}} @endif"></div>
                                    <div class="line d-inline-flex p-0 m-0  @if($job->pivot->status != 'Applied' && $job->pivot->status != 'Viewed') {{ 'active-line' }} @endif"></div>
                                </div>
                                <p class="ml-2 p-0 m-0">@if($job->pivot->status != "Applied"){{$job->pivot->updated_at->diffForHumans()}} @else {{"yet"}} @endif</p>
                            </div>

                            <div class='job-status d-inline-block other-status p-0 m-0'>
                                <p class="status-text p-0 m-0
                                @if($job->pivot->status == 'In consideration'){{ 'text-info font-weight-bolder'}} 
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
                    <div class="position-absolute logo d-none d-md-block"><img src="{{ asset('avatar/$job->company->logo') }}" alt="" width="70px" height="70px"></div>
                </div>
            @endforeach
        </div>
        <div class="col-sm-5">
            <div class="job-container">
            </div>
        </div>

        <div class="job d-none" id="job">
            <div class="applications_count-container pt-2 pb-2 pl-4 pr-4 mb-4">
                    <h1 class="font-weight-bolder job_title"><a href=""></a></h1>
                    <span class="d-inline-block job-city"></span>
                    <span class="country d-inline-block font-weight-bolder"></span>
                    <p class="job-date"></p>
                    <div class="applications_statistic"> 
                        <ul class="list-unstyled p-1 applicants-count d-inline-block">
                            <li class="d-inline-block border-right">
                                <p class="vacancies">3</p>
                                <p>vacancy</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="viewed-count">1</p>
                                <p>Viewed</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="notselected-count">2</p>
                                <p class="text-info">selected</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="inconsediration-count">3</p>
                                <p class="text-success">in consediration</p>
                            </li>
                            <li class="d-inline-block">
                                <p class="applied-count">2</p>
                                <p class="text-primary">applied</p>
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