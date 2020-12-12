@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Create new Skill</h4>
        </div>

        <div class="card-body">
            <form action="{{route('skills.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="Name">Skill Name</label>
                    <input type="text" name='name' class="form-control @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year_of_experience">year of experience</label>
                    <input type="text" name="year_of_experience" class="form-control @error('year_of_experience') error @enderror" value="{{old('year_of_experience')}}">
                    @error('year_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proficiency">Proficiency</label>
                    <input type="text" name="proficiency" class="form-control @error('proficiency') error @enderror" value="{{old('proficiency')}}">
                    @error('proficiency')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


                <button class="btn btn-success" type='submit'>Add Skill</button>
                <a class="btn btn-primary" href="{{route('skills.index')}}">Cancel</a>

            </form>
        </div>
    </div>
@endsection
