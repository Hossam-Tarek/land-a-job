@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
        <h4>Update {{$job->title}}</h4>
        </div>

        <div class="card-body">
            <form action="{{route('jobs.update',$job->id)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" name='title' class="form-control @error('title') error @enderror" value="{{$job->title}}">
                    @error('title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Job Type">Select Job Type</label>
                    <select name="job_type_id"  class="form-control @error('job_type_id') error @enderror">
                        @foreach($jobTypes as $jobType)
                            <option value="{{$jobType->id}}"
                                @if($jobType->id === $job->job_type_id) selected @endif
                                > {{$jobType->name}}</option>
                        @endforeach
                    </select>
                    @error('job_type_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="industry_category_id">Select Industry Category</label>
                    <select name="industry_category_id"  class="form-control @error('industry_category_id') error @enderror">
                        @foreach($industryCategories as $industryCategory)
                            <option value="{{$industryCategory->id}}"
                                @if($industryCategory->id === $job->industry_category_id) selected @endif
                                > {{$industryCategory->name}}</option>
                        @endforeach
                    </select>
                    @error('industry_category_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="career_level_id">Select Career Level</label>
                    <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror">
                        @foreach($careerLevels as $careerLevel)
                            <option value="{{$careerLevel->id}}"
                                @if($careerLevel->id === $job->career_level_id) selected @endif
                                > {{$careerLevel->name}}</option>
                        @endforeach
                    </select>
                    @error('career_level_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company_id">Select Company</label>
                    <select name="company_id"  class="form-control @error('company_id') error @enderror">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"
                                @if($company->id === $job->company_id) selected @endif
                                > {{$company->name}}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country_id">Select Country</label>
                    <select name="country_id"  class="form-control @error('country_id') error @enderror">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"
                                @if($country->id === $job->country_id) selected @endif
                                > {{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="city_id">Select City</label>
                    <select name="city_id"  class="form-control @error('city_id') error @enderror">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"
                                @if($city->id === $job->city_id) selected @endif
                                > {{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') error @enderror">
                        <option value="1"  @if($job->status === 1) selected @endif>True</option>
                        <option value="0"  @if($job->status === 0) selected @endif>False</option>
                    </select>
                    @error('status')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="min_years_of_experience">Minimum Year Of Experience</label>
                    <input type="text" name="min_years_of_experience" class="form-control @error('min_years_of_experience') error @enderror" value="{{$job->min_years_of_experience}}">
                    @error('min_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="max_years_of_experience">Max Year Of Experience</label>
                    <input type="text" name="max_years_of_experience" class="form-control @error('max_years_of_experience') error @enderror" value="{{$job->max_years_of_experience}}">
                    @error('max_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vacancies">Vacancies</label>
                    <input type="text" name="vacancies" class="form-control @error('vacancies') error @enderror" value="{{$job->vacancies}}">
                    @error('vacancies')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="min_salary">Minimum Salary</label>
                    <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{$job->min_salary}}">
                    @error('min_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="max_salary">Maximum Salary</label>
                    <input type="text" name="max_salary" class="form-control @error('max_salary') error @enderror" value="{{$job->max_salary}}">
                    @error('max_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{$job->description}}</textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea class="form-control @error('requirements') error @enderror" name="requirements" id="content" cols="5" rows="5">{{$job->requirements}}</textarea>
                    @error('requirements')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Add Job</button>
                <a class="btn btn-primary" href="{{route('jobs.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
