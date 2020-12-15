<<<<<<< HEAD
@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Edit Profile</h4>
        </div>

        <div class="card-body">
            <form action="{{route('profiles.update',$profile->id)}}" method='post' enctype='multipart/form-data'>
                @csrf 
                @method('put')
                <div class="form-group">
                    <label for="career_level_id">Select Career Level</label>
                    <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror" value="{{old('career_level_id')}}">
                        @foreach($careerLevels as $careerLevel)
                            <option value="{{$careerLevel->id}}"
                                @if($careerLevel->id === $profile->career_level_id) {{"selected"}} @endif
                            > {{$careerLevel->name}}</option>
                        @endforeach
                    </select>
                    @error('career_level_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country_id">Select Country</label>
                    <select name="country_id"  class="form-control @error('country_id') error @enderror" value="{{old('country_id')}}">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"
                                 @if($country->id === $profile->country_id) {{"selected"}} @endif
                            > {{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city_id">Select City</label>
                    <select name="city_id"  class="form-control @error('city_id') error @enderror" value="{{old('city_id')}}">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"
                                @if($city->id === $profile->city_id) {{"selected"}} @endif
                            > {{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control @error('status') error @enderror" value="{{old('status')}}">
                        <option value="0" @if($profile->gender == 0) {{"selected"}} @endif>Male</option>
                        <option value="1" @if($profile->gender == 1) {{"selected"}} @endif>Female</option>
                    </select>
                    @error('gender')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="min_salary">Minimum Salary</label>
                    <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{$profile->min_salary}}">
                    @error('min_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="military_status">military_status</label>
                    <select name="military_status" class="form-control @error('military_status') error @enderror" value="{{old('military_status')}}">
                    @if(isset($profile)) 
                    <option value={{ $profile->military_status}} selected >{{$profile->military_status}}</option>
                    @endif    
                        <option value="Exempted">Exempted</option>
                        <option value="Completed">Completed</option>
                        <option value="Postponed">Postponed</option>
                        <option value="Serving">Serving</option>
                        <option value="Does not apply">Does not apply</option>
                    </select>
                    @error('military_status')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="education_level">Education_level</label>
                    <select name="education_level" class="form-control @error('education_level') error @enderror" value="{{$profile->education_level}}">
                        @if(isset($profile)) 
                            <option value={{$profile->education_level}} selected >{{$profile->education_level}}</option>
                        @endif 
                        <option value="HighSchool">High School</option>
                        <option value="MasterDegree">Master Degree</option>
                        <option value="BachelorDegree">Bachelor Degree</option>
                        <option value="DoctorateDegree">Doctorate Degree</option>
                    </select>
                    @error('education_level')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="job_title">Job Title</label>
                    <input type="text" name='job_title' class="form-control @error('job_title') error @enderror" value="{{$profile->job_title}}">
                    @error('job_title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cv" class="custom-file-upload">  
                        <input type="text" disabled placeholder="Upload Your cv"> Choose File  
                    </label>  
                    <input id="cv" name="cv" type="file"/>
                    @error('cv')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Edit Profile</button>
                <a class="btn btn-primary" href="{{route('profiles.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
=======
@foreach($usersId as $userId)
<button>{{ $userId}}</button>
@endforeach
>>>>>>> develop
