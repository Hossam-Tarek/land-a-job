@extends("company.layouts.master")

@section("title", "Create New Job")

@section('style-sheets')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection

@section('content')
    <div class="card w-75 mx-auto my-5">
        <div class="card-header bg-secondary text-light">
            <h4 class="">Create new Job</h4>
        </div>

        <div class="card-body">
            <form class="" action="{{route('all-jobs.store')}}" method='post' enctype='multipart/form-data'>
                @csrf

                <div class="form-group">
                    <label class=" " for="title">Job Title</label>
                    <div class="input-container">
                        <i class="fas fa-user-md icon"></i>
                        <input type="text" name='title' class="form-control @error('title') error @enderror" value="{{old('title')}}" value="{{old('title')}}">
                    </div>
                    @error('title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="" for="Job Type"> Job Type</label>
                    <div class="input-container">
                        <i class="fab fa-typo3 icon"></i>
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
                    <label class="" for="industry_category_id"> Industry Category</label>
                    <div class="input-container">
                        <i class="fa fa-industry icon"></i>
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
                    <label class="" for="career_level_id"> Career Level</label>
                    <div class="input-container">
                        <i class="fas fa-layer-group icon"></i>
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
                    <label class="" for="company_id"> Company</label>
                    <div class="input-container">
                        <i class="fa fa-building icon"></i>
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
                    <label class="" for="country_id"> Country</label>
                    <div class="input-container">
                        <i class="fa fa-flag icon"></i>
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
                    <label class="" for="city_id"> City</label>
                    <div class="input-container">
                        <i class="fa fa-city icon"></i>
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
                    <label class="" for="status">Status</label>
                    <div class="input-container">
                        <i class="fas fa-thermometer-quarter icon"></i>
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
                    <label class="" for="vacancies">Vacancies</label>
                    <div class="input-container">
                        <i class="fas fa-user-graduate icon"></i>
                    <input type="text" name="vacancies" class="form-control @error('vacancies') error @enderror" value="{{old('vacancies')}}">
                    </div>
                    @error('vacancies')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="" for="min_years_of_experience">Minimum Year Of Experience</label>
                    <div class="input-container">
                        <i class="fas fa-user-minus icon"></i>
                    <input type="text" name="min_years_of_experience" class="form-control @error('min_years_of_experience') error @enderror" value="{{old('min_years_of_experience')}}">
                    </div>
                    @error('min_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="" for="max_years_of_experience">Max Year Of Experience</label>
                    <div class="input-container">
                        <i class="fas fa-user-plus icon"></i>
                    <input type="text" name="max_years_of_experience" class="form-control @error('max_years_of_experience') error @enderror" value="{{old('max_years_of_experience')}}">
                    </div>
                    @error('max_years_of_experience')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="" for="min_salary">Minimum Salary</label>
                    <div class="input-container">
                        <i class="fa fa-yen-sign icon"></i>
                    <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{old('min_salary')}}">
                    </div>
                    @error('min_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label class="" for="max_salary">Maximum Salary</label>
                    <div class="input-container">
                        <i class="fa fa-pound-sign icon"></i>
                    <input type="text" name="max_salary" class="form-control @error('max_salary') error @enderror" value="{{old('max_salary')}}">
                  </div>
                    @error('max_salary')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
            </div>




            <div class="form-group">
                <label class="" for="skill">Select Skills</label><br>
                   <select name="skills[]" id="" multiple class="form-control">
                        @foreach($skills as $skill)
                            <option value="{{$skill->id}}">{{$skill->name}}</option>
                        @endforeach
                   </select>
            </div>


                <div class="form-group">
                    <label class="" for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="" for="requirements">Requirements</label>
                    <textarea class="form-control @error('requirements') error @enderror" name="requirements" id="content" cols="5" rows="5">{{old('requirements')}}</textarea>
                    @error('requirements')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Add Job</button>
                <a class="btn btn-primary" href="{{route('all-jobs.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
