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
            <form class="" action="{{route('jobs.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label class="form-label-lg " for="title">Job Title</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-subtitles"></span>
                        </div>
                        <input type="text" name='title' class="form-control @error('title') error @enderror" value="{{old('title')}}" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="Job Type"> Job Type</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-folder-open"></span>
                        </div>
                    <select name="job_type_id"  class="form-control @error('job_type_id') error @enderror" value="{{old('job_type_id')}}">
                        <option></option>
                        @foreach($jobTypes as $jobType)
                            <option value="{{$jobType->id}}"> {{$jobType->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('job_type_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
            </div>

                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="industry_category_id"> Industry Category</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-modal-window"></span>
                        </div>
                    <select name="industry_category_id"  class="form-control @error('industry_category_id') error @enderror" value="{{old('industry_category_id')}}">
                        <option></option>
                        @foreach($industryCategories as $industryCategory)
                            <option value="{{$industryCategory->id}}"> {{$industryCategory->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('industry_category_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="career_level_id"> Career Level</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-credit-card"></span>
                        </div>
                    <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror" value="{{old('career_level_id')}}">
                        <option></option>
                        @foreach($careerLevels as $careerLevel)
                            <option value="{{$careerLevel->id}}"> {{$careerLevel->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('career_level_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="company_id"> Company</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-compressed"></span>
                        </div>
                    <select name="company_id"  class="form-control @error('company_id') error @enderror" value="{{old('company_id')}}">
                        <option></option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"> {{$company->name}}</option>
                        @endforeach
                    </select>
                  </div>
                    @error('company_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="country_id"> Country</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-flag"></span>
                        </div>
                    <select name="country_id"  class="form-control @error('country_id') error @enderror" value="{{old('country_id')}}">
                        <option></option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}"> {{$country->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('country_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="city_id"> City</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-home"></span>
                        </div>
                    <select name="city_id"  class="form-control @error('city_id') error @enderror" value="{{old('city_id')}}">
                        <option></option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}"> {{$city->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('city_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="status">Status</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                    <select name="status" class="form-control @error('status') error @enderror" value="{{old('status')}}">
                        <option></option>
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                    </div>
                    @error('status')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="vacancies">Vacancies</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-user"></span>
                        </div>
                    <input type="text" name="vacancies" class="form-control @error('vacancies') error @enderror" value="{{old('vacancies')}}">
                    </div>
                    @error('vacancies')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="min_years_of_experience">Minimum Year Of Experience</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-cloud-download"></span>
                        </div>
                    <input type="text" name="min_years_of_experience" class="form-control @error('min_years_of_experience') error @enderror" value="{{old('min_years_of_experience')}}">
                    </div>
                    @error('min_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="max_years_of_experience">Max Year Of Experience</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-cloud-upload"></span>
                        </div>
                    <input type="text" name="max_years_of_experience" class="form-control @error('max_years_of_experience') error @enderror" value="{{old('max_years_of_experience')}}">
                    </div>
                    @error('max_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="min_salary">Minimum Salary</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                         <span class="glyphicon glyphicon-eur"></span>
                        </div>
                    <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{old('min_salary')}}">
                    </div>
                    @error('min_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label-lg" for="max_salary">Maximum Salary</label>
                    <div class="input-group my-3">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-yen"></span>
                        </div>
                    <input type="text" name="max_salary" class="form-control @error('max_salary') error @enderror" value="{{old('max_salary')}}">
                  </div>
                    @error('max_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>




            <div class="form-group">
                <label for="title">Select Skills</label><br>
                    @foreach($skills as $skill)
                       <label><input  type="checkbox" name='skills[]' value="{{$skill->id}}">{{$skill->name}}</label><br>
                    @endforeach
            </div>


                <div class="form-group">
                    <label class="form-label-lg" for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label-lg" for="requirements">Requirements</label>
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
