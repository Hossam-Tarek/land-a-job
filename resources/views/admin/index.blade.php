@extends('admin.layouts.master')
@section('title','Dashboard')

@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success my-5">
        {{session()->get('success')}}
    </div>
    @endif
</div>
<div class="container mt-5">
    <div class="row">
        <!-- Users -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['users']}} Users</div>
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-user"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('all-users.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Companies -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['companies']}} Companies</div>
                    <div class="card-body-icon">
                        <i class="far fa-fw fa-building"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('all-companies.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Countries -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text ">{{$data['countries']}} Countries</div>
                    <div class="card-body-icon">
                        <i class="far fa-flag"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('countries.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Cities -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['cities']}} Cities</div>
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-city"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('cities.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Categories -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['categories']}} Categories</div>
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list-alt"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('industry-categories.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Job Titles -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['jobTitles']}} Job Titles</div>
                    <div class="card-body-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('job-titles.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Languages -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['languages']}} Languages</div>
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-language"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('languages.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Messages -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['messages']}} Messages</div>
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('admin.messages.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
        <!-- Skills -->
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="row m-0 admin-card">
                <div class="col-12 row m-0 justify-content-between align-items-center admin-card-body flex-nowrap">
                    <div class="admin-card-text">{{$data['skills']}} Skills</div>
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-award"></i>
                    </div>
                </div>
                <a class="col-12 admin-card-footer" href="{{route('skills.index')}}">
                    <span>View Details<i class="fa fa-angle-right ml-2"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
