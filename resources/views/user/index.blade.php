@extends("user.layouts.master")

@section("title", "Land a job")

@section("style-sheets")
@endsection

@section("content")
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="container">
        @if($jobs->count()>0)
            @foreach($jobs as $job)
                <div class="row mt-4">
                    <div class="col-md-8">
                        <h5><a href="{{ route('user.show-job', $job) }}">{{ $job->title }}</a></h5>
                        <span><a href="" class="text-secondary">{{ $job->company->name }}</a></span>
                        <span class="text-success"> - {{ $job->country->name }}</span>
                        <span class="text-danger">{{ $job->jobType->name }}</span>
                        <span class="text-primary"> Experienced {{ $job->min_years_of_experience }} - {{ $job->max_years_of_experience }}  Yrs of Exp</span>
                        <span class=""> - {{ $job->requirements }}</span>
                    </div>
                </div>
                <hr>
            @endforeach
        @else
            <div class="card-header text-center">
                <h2>No jobs yet</h2>
            </div>
        @endif
    </div>
@endsection

@section("scripts")
@endsection
