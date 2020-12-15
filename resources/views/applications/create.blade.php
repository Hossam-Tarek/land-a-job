@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Create new Application</h4>
        </div>

        <div class="card-body">
            <form action="{{route('applications.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="job_id">Select Job Title</label>
                    <select name="job_id"  class="form-control @error('job_id') error @enderror" value="{{old('job_id')}}">
                        @foreach($jobs as $job)
                            <option value="{{$job->id}}"> {{$job->title}}</option>
                        @endforeach
                    </select>
                    @error('job_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') error @enderror" value="{{old('status')}}">
                        <option value="Applied">Applied</option>
                        <option value="Viewed">Viewed</option>
                        <option value="Selected">Selected</option>
                        <option value="In consideration"> In consideration</option>
                        <option value="Not selected">Not selected</option>
                    </select>
                    @error('status')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Add Application</button>
                <a class="btn btn-primary" href="{{route('applications.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
