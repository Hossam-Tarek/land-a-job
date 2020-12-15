@extends('layouts.app')
@section('content')
 <div class="row">
     <div class="col-lg-8">
        <div class="bg-secondary p-4 text-light">
            <h3>{{$job->title}}</h3>
            <span class="text-primary">{{$job->company->name}}</span>
            <h6>{{$job->country->name}}</h6>
            <a href="{{route('jobs.create')}}" class="btn btn-success">Post a job Like This</a>
            <span class="mx-4">{{$job->applications->count()}} Applicants for</span>
        </div>
     </div>
     <div class="col-lg-4 bg-primary p-3 ">
         <h3 class="text-dark">About {{$job->company->name}}</h3>
         <p class="text-light">{{$job->company->about}}</p>
     </div>
 </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="bg-primary p-4">
                <div class="row">
                    <div class="col-lg-4">
                               <h4>Experience Needed</h4>
                               <span> {{$job->min_years_of_experience}} to {{$job->max_years_of_experience}}  years</span>
                    </div>

                    <div class="col-lg-4">
                            <h4>Career Level:</h4>
                            <span>{{$job->careerLevel->name}}</span>
                    </div>

                    <div class="col-lg-4 ">
                           <h4>Job Type:</h4>
                           <span>{{$job->jobType->name}}</span>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-4">
                        <h4>Salary</h4>
                        <span>{{$job->max_salary}}</span>
                    </div>
                    <div class="col-lg-4">
                        <h4>Vacancies</h4>
                        <span>{{$job->vacancies}}</span>
                    </div>
                </div>

                <div class="mt-5">
                    <h4>Job Categories:</h4>
                    <h5>{{$job->industryCategory->name}}</h5>

                    <h2 class="mt-5">About The Job</h2>
                    <Li>{{$job->description}}</Li>
                </div>
            </div>
        </div>
        <div class="col-lg-4 bg-secondary my-5">
           <h2 class="my-5"> Similar Jobs</h2>
            @foreach ($related as $item)
                <h3>{{$item->title}}</h3>
                <p class="text-primary">{{$item->company->name}}</p>
                <span >{{$item->city->name}}</span>
                <hr>
            @endforeach
        </div>
    </div>
  <div class="row">
      <div class="col-lg-8">
        <div class="mt-5 bg-secondary p-4 text-light">
            <h3>Job Requirements</h3>
            <p class=""> {{$job->requirements}}</p>
        </div>
      </div>
  </div>
@endsection

