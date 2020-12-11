@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Update new Skill</h4>
        </div>

        <div class="card-body">
            <form action="{{route('skills.update',$skill)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="Name">Skill Name</label>
                    <input type="text" name='name' class="form-control @error('name') error @enderror" value="{{$skill->name}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year_of_experience">Vacancies</label>
                    <input type="text" name="year_of_experience" class="form-control @error('year_of_experience') error @enderror" value="{{$skill->year_of_experience}}">
                    @error('year_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proficiency">Proficiency</label>
                    <input type="text" name="proficiency" class="form-control @error('proficiency') error @enderror" value="{{$skill->proficiency}}">
                    @error('proficiency')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <a class="btn btn-primary" href="{{route('skills.index')}}">Cancel</a>
                <button class="btn btn-success" type='submit'>Update Skill</button>
            </form>
        </div>
    </div>
@endsection
