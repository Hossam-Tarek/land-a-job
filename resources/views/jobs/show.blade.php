@extends('layouts.app')
@section('content')
    <div class="bg-white p-4">
        <h3>{{$job->title}}</h3>
        <span class="text-primary">{{$job->company->name}}</span>
        <h6>{{$job->country->name}}</h6>
    </div>

    <div class="bg-white p-4 mt-5">
        <div class="row">
            <div class="lg-4">
                   <div>
                       <h4>Experience Needed</h4>
                       <span class="text-primary"> {{$job->min_years_of_experience}} to {{$job->max_years_of_experience}}  years</span>
                   </div>
                  <hr>
                  <div>
                     <h4>Salary</h4>
                     <span>{{$job->max_salary}}</span>
                  </div>
            </div>

            <div class="lg-4 ml-5">
                <div>
                    <h4>Career Level:</h4>
                    <span>{{$job->careerLevel->name}}</span>
                </div>
                <hr>
                <div>
                    <h4>Vacancies</h4>
                    <span>{{$job->vacancies}}</span>
                </div>
            </div>

            <div class="lg-4 ml-5">
               <div>
                   <h4>Job Type:</h4>
                   <span>{{$job->jobType->name}}</span>
               </div>
                <hr>
            </div>
        </div>

        <div class="mt-5">
            <h4>Job Categories:</h4>
            <h5>{{$job->industryCategory->name}}</h5>

            <h2 class="mt-5">About The Job</h2>
            <Li>{{$job->description}}</Li>
        </div>
    </div>
    <div class="mt-5 bg-white p-4">
        <h3>Job Requirements</h3>
        <p class=""> {{$job->requirements}}</p>
    </div>
@endsection

