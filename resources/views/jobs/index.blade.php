@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{route('jobs.create')}}" class="btn btn-success">Add new Job</a>
        @if($jobs->count()>0)
            <h1 class="text-center">All Jobs</h1>
        @foreach($jobs as $job)
            <div class="row mt-4">
                <div class="col-md-8">
                        <h5><a href="{{route('jobs.show',$job->id)}}" >{{$job->title}}</a></h5>
                        <span><a href="" class="text-secondary">{{$job->company->name}}</a></span>
                        <span class="text-success"> - {{$job->country->name}}</span>
                        <span class="text-danger">{{$job->jobType->name}}</span>
                        <span class="text-primary"> Experienced {{$job->min_years_of_experience}} - {{$job->max_years_of_experience}}  Yrs of Exp</span>
                        <span class=""> - {{$job->requirements}}</span>
                </div>
                <div class="col-md-4">
                    <form action="{{route('jobs.destroy',$job->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger float-right">Delete</button>
                    </form>
                    <a href="{{route('jobs.edit',$job->id)}}" class="btn btn-primary mr-1 float-right">Edit</a>
                </div>

            </div>
            <hr>
        @endforeach

        @else
            <div class="card-header text-center">
                <h2>no posts yet</h2>
            </div>
        @endif
@endsection
{{--<td>{{$job->title}}</td>--}}
{{--<td>{{$job->status}}</td>--}}
{{--<td>{{$job->vacancies}}</td>--}}
{{--<td>{{$job->min_salary}}</td>--}}
{{--<td>{{$job->description}}</td>--}}
{{--<td>{{$job->requirements}}</td>--}}
