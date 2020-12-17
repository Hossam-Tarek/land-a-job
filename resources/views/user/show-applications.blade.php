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
        <div class="col-md-7">
            @foreach($jobs as $job)
                <div class="application-container mb-3">
                    <div class="application pt-4 pb-3 pl-3 pr-3 position-relative" data-id='{{$job->id}}'>
                        <div class="status pr-1 pl-1 mb-5 position-absolute">@if($job->status == 0) {{ "closed "}} @else {{ "open" }} @endif</div>
                        <p class="font-weight-bold job-title mt-3">{{$job->title}}</p>
                        <div>
                            <span class="company">{{$job->company->name}}-</span>
                            <span class="address">{{$job->city->name}},</span>
                            <span class="address">{{$job->country->name}}</span>
                        </div>
                        <div class="p-2 pivot-status mt-4">

                            <div class='d-sm-block job-status d-md-inline-block mr-n3 applied'>
                                <div>
                                    <p class="status-text apply">Applied</p>
                                    <div class="p-0 m-0">
                                        <div class="point d-inline-flex"></div>
                                        <div class="line d-inline-flex mt-n1 ml-n1"></div>
                                    </div>
                                    <p>{{$job->pivot->created_at->diffForHumans()}}</p>
                                </div>
                            </div>

                            <div class='d-sm-block job-status d-md-inline-block mr-n3 viewed'>
                                <div>
                                    <p class="status-text view">@if($job->pivot->status != "Applied"){{"Viewed"}} @else {{"No actions yet"}} @endif</p>
                                    <div class="p-0 m-0">
                                        <div class="point d-inline-flex"></div>
                                        <div class="line d-inline-flex mt-n1 ml-n1"></div>
                                    </div>
                                    <p class="ml-2">@if($job->pivot->status != "Applied"){{$job->pivot->updated_at->diffForHumans()}} @else {{"."}} @endif</p>
                                </div>
                            </div>

                            <div class='d-sm-block job-status d-md-inline-block mr-n3 in-consediration'>
                                <div>
                                    <p class="status-text other-status">@if($job->pivot->status != "Viewed" && $job->pivot->status != "Applied"){{$job->pivot->status}} @else {{"No actions yet"}}  @endif</p>
                                    <div class="p-0 m-0">
                                        <div class="point d-inline-flex"></div>
                                    </div>
                                    <p class="ml-2">@if($job->pivot->status != "Viewed" && $job->pivot->status != "Applied"){{$job->pivot->updated_at->diffForHumans()}} @else {{"."}} @endif</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-5 job" id="job">
            <div class="">
            <div class="applications_count-container pt-2 pb-2 pl-4 pr-4 d-inline-block mb-4">
                    <h1 class="font-weight-bolder job_title">
                         fgfghfhg
                    </h1> 
                    <span class="d-inline-block job-city">
                        vnbbn hhbhjv 
                        
                    </span>
                    <span class="country d-inline-block"></span>
                    <p class="job-date">23/3/2020</p>
                    <div class="applications_statistic"> 
                        <ul class="list-unstyled p-1 applicants-count d-inline-block">
                            <li class="d-inline-block border-right">
                                <p class="vacancy">3

                                </p>
                                <p>vacancy
                                </p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="viewed-count">1
                                </p>
                                <p>Viewed</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="notselected-count">2
                                </p>
                                <p class="text-info">selected</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p class="inconsediration-count">3
                                </p>
                                <p class="text-success">in consediration</p>
                            </li>
                            <li class="d-inline-block">
                                <p class="applied-count">2
                                </p>
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