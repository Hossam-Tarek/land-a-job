@extends("user.layouts.master")
@section("title", "Edit Skill")
@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-sm-12 col-md-6">
            <form action="{{route('user.skill.update', $skill->id)}}" method='post' enctype='multipart/form-data'>
                @csrf 
                @method('put')
                <div class="form-group mb-3">
                    <select class="form-control" name="proficiency" id="proficiency">
                        <option {{ $skill->pivot->Proficiency == 'No Proficiency' ? 'selected' : '' }} value="No Proficiency">No Proficiency</option>
                        <option {{ $skill->pivot->Proficiency == 'Elementary Proficiency' ? 'selected' : '' }} value="Elementary Proficiency">Elementary Proficiency</option>
                        <option {{ $skill->pivot->Proficiency == 'Limited Working Proficiency' ? 'selected' : '' }} value="Limited Working Proficiency">Limited Working Proficiency</option>
                        <option {{ $skill->pivot->Proficiency == 'Professional Working Proficiency' ? 'selected' : '' }} value="Professional Working Proficiency">Professional Working Proficiency</option>
                        <option {{ $skill->pivot->Proficiency == 'Less than 1 year' ? 'selected' : '' }} value="Full Professional Proficiency">Full Professional Proficiency</option>
                    </select>
                    @error("proficiency")
                    <p class="help text-danger">{{ $errors->first("proficiency") }}</p>
                    @enderror
                </div> 
                <div class="form-group mb-3">
                    <select  class="form-control" name="year_of_experience" id="year_of_experience">
                        <option selected>Years Of Experience</option>
                        <option {{ $skill->pivot->year_of_experience == 'Less than 1 year' ? 'selected' : '' }} value="Less than 1 year">Less than 1 year</option>
                        <option {{ $skill->pivot->year_of_experience == '1-3 years' ? 'selected' : '' }} value="1-3 years">1-3 years</option>
                        <option {{ $skill->pivot->year_of_experience == '3-5 years' ? 'selected' : '' }} value="3-5 years">3-5 years</option>
                        <option {{ $skill->pivot->year_of_experience == '5-7 years' ? 'selected' : '' }} value="5-7 years">5-7 years</option>
                        <option {{ $skill->pivot->year_of_experience == 'More than 7 years' ? 'selected' : '' }} value="More than 7 years">More than 7 years</option>
                    </select>
                    @error("year_of_experience")
                    <p class="help text-danger">{{ $errors->first("year_of_experience") }}</p>
                    @enderror
                </div> 
                <button class="btn btn-warning mr-3" type='submit'>Edit Skill</button>
                <a class="btn btn-danger" href="{{route('user.edit')}}">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection