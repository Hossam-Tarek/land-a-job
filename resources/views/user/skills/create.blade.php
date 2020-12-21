@extends("user.layouts.master")
@section("title", "Add Skill")
@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-sm-12 col-md-6">
            <form action="{{route('user.skill.store')}}" method='post' enctype='multipart/form-data'>
                @csrf 
                <div class="form-group mb-3">
                    <select class="form-control" name="skill_id" id="skill_id">
                        @foreach($skills as $skill)
                            <option value="{{ $skill->id }}"
                                {{ old('name') == $skill->id ? "selected" : "" }}>{{ $skill->name }}
                            </option>                           
                        @endforeach
                    </select>
                    @error("skill_id")
                    <p class="help text-danger">{{ $errors->first("skill_id") }}</p>
                    @enderror
                </div> 
                <div class="form-group mb-3">
                    <select class="form-control" name="proficiency" id="proficiency">
                        <option {{ (old('proficiency')) == 'No Proficiency' ? 'selected' : '' }} value="No Proficiency">No Proficiency</option>
                        <option {{ (old('proficiency')) == 'Elementary Proficiency' ? 'selected' : '' }} value="Elementary Proficiency">Elementary Proficiency</option>
                        <option {{ (old('proficiency')) == 'Limited Working Proficiency' ? 'selected' : '' }} value="Limited Working Proficiency">Limited Working Proficiency</option>
                        <option {{ (old('proficiency')) == 'Professional Working Proficiency' ? 'selected' : '' }} value="Professional Working Proficiency">Professional Working Proficiency</option>
                        <option {{ (old('proficiency')) == 'Less than 1 year' ? 'selected' : '' }} value="Full Professional Proficiency">Full Professional Proficiency</option>
                    </select>
                    @error("proficiency")
                    <p class="help text-danger">{{ $errors->first("proficiency") }}</p>
                    @enderror
                </div> 
                <div class="form-group mb-3">
                    <select  class="form-control" name="year_of_experience" id="year_of_experience">
                        <option {{ (old('year_of_experience')) == 'Less than 1 year' ? 'selected' : '' }} value="Less than 1 year">Less than 1 year</option>
                        <option {{ (old('year_of_experience')) == '1-3 years' ? 'selected' : '' }} value="1-3 years">1-3 years</option>
                        <option {{ (old('year_of_experience')) == '3-5 years' ? 'selected' : '' }} value="3-5 years">3-5 years</option>
                        <option {{ (old('year_of_experience')) == '5-7 years' ? 'selected' : '' }} value="5-7 years">5-7 years</option>
                        <option {{ (old('year_of_experience')) == 'More than 7 years' ? 'selected' : '' }} value="More than 7 years">More than 7 years</option>
                    </select>
                    @error("year_of_experience")
                    <p class="help text-danger">{{ $errors->first("year_of_experience") }}</p>
                    @enderror
                </div> 
                

                <button class="btn btn-success" type='submit'>Add Skill</button>
                <a class="btn btn-danger" href="{{route('skills.index')}}">Cancel</a>
            </form>
    </div>
</div>
@endsection