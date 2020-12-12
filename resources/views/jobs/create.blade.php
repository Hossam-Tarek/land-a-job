@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Create new Job</h4>
        </div>

        <div class="card-body">
            <form action="{{route('jobs.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="title">Job Title</label>
                    <input type="text" name='title' class="form-control @error('title') error @enderror" value="{{old('title')}}" value="{{old('title')}}">
                    @error('title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Job Type">Select Job Type</label>
                    <select name="job_type_id"  class="form-control @error('job_type_id') error @enderror" value="{{old('job_type_id')}}">
                        @foreach($jobTypes as $jobType)
                            <option value="{{$jobType->id}}"> {{$jobType->name}}</option>
                        @endforeach
                    </select>
                    @error('job_type_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="industry_category_id">Select Industry Category</label>
                    <select name="industry_category_id"  class="form-control @error('industry_category_id') error @enderror" value="{{old('industry_category_id')}}">
                        @foreach($industryCategories as $industryCategory)
                            <option value="{{$industryCategory->id}}"> {{$industryCategory->name}}</option>
                        @endforeach
                    </select>
                    @error('industry_category_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="career_level_id">Select Career Level</label>
                    <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror" value="{{old('career_level_id')}}">
                        @foreach($careerLevels as $careerLevel)
                            <option value="{{$careerLevel->id}}"> {{$careerLevel->name}}</option>
                        @endforeach
                    </select>
                    @error('career_level_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company_id">Select Company</label>
                    <select name="company_id"  class="form-control @error('company_id') error @enderror" value="{{old('company_id')}}">
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"> {{$company->name}}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="country_id">Select Country</label>
                    <select name="country_id"  class="form-control @error('country_id') error @enderror" value="{{old('country_id')}}">
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"> {{$country->name}}</option>
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
                            <option value="{{$city->id}}"> {{$city->name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') error @enderror" value="{{old('status')}}">
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                    @error('status')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="min_years_of_experience">Minimum Year Of Experience</label>
                    <input type="text" name="min_years_of_experience" class="form-control @error('min_years_of_experience') error @enderror" value="{{old('min_years_of_experience')}}">
                    @error('min_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="max_years_of_experience">Max Year Of Experience</label>
                    <input type="text" name="max_years_of_experience" class="form-control @error('max_years_of_experience') error @enderror" value="{{old('max_years_of_experience')}}">
                    @error('max_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="vacancies">Vacancies</label>
                    <input type="text" name="vacancies" class="form-control @error('vacancies') error @enderror" value="{{old('vacancies')}}">
                    @error('vacancies')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="min_salary">Minimum Salary</label>
                    <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{old('min_salary')}}">
                    @error('min_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="max_salary">Maximum Salary</label>
                    <input type="text" name="max_salary" class="form-control @error('max_salary') error @enderror" value="{{old('max_salary')}}">
                    @error('max_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="requirements">Requirements</label>
                    <textarea class="form-control @error('requirements') error @enderror" name="requirements" id="content" cols="5" rows="5">{{old('requirements')}}</textarea>
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
