@extends("company.layouts.master")
@section("title", "Create New Job")
@section('style-sheets')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
 <div class="card w-75 mx-auto my-5">
        <div class="card-header bg-secondary text-light">
        <h4>Update {{$job->title}}</h4>
        </div>

        <div class="card-body">
            <form action="{{route('all-jobs.update',$job->id)}}" method='post' enctype='multipart/form-data'>
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="title">Job Title</label>
                    <div class="input-container">
                        <i class="fas fa-user-md icon"></i>
                        <input type="text" name='title' class="form-control @error('title') error @enderror" value="{{$job->title}}">
                    </div>
                    @error('title')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="career_level_id"> Career Level</label>
                    <div class="input-container">
                        <i class="fas fa-layer-group icon"></i>
                        <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror" value="{{old('career_level_id')}}">
                        <option></option>
                        @foreach($careerLevels as $careerLevel)
                            <option value="{{$careerLevel->id}}"
                                @if($careerLevel->id === $job->career_level_id) selected @endif
                                > {{$careerLevel->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    @error('career_level_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Job Type"> Job Type</label>
                        <div class="input-container">
                            <i class="fab fa-typo3 icon"></i>
                            <select name="job_type_id"  class="form-control @error('job_type_id') error @enderror">
                                <option></option>
                                @foreach($jobTypes as $jobType)
                                    <option value="{{$jobType->id}}"
                                    @if($jobType->id === $job->job_type_id) selected @endif
                                        > {{$jobType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('job_type_id')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                       </div>

                       <div class="form-group col-md-6">
                        <label for="industry_category_id"> Industry Category</label>
                        <div class="input-container">
                            <i class="fa fa-industry icon"></i>
                            <select name="industry_category_id"  class="form-control @error('industry_category_id') error @enderror" value="{{old('industry_category_id')}}">
                                <option></option>
                                @foreach($industryCategories as $industryCategory)
                                    <option value="{{$industryCategory->id}}"
                                    @if($industryCategory->id === $job->industry_category_id) selected @endif
                                        > {{$industryCategory->name}}</option>
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
                        <label for="country_id"> Country</label>
                        <div class="input-container">
                            <i class="fa fa-flag icon"></i>
                            <select name="country_id"  class="form-control @error('country_id') error @enderror" value="{{old('country_id')}}">
                            <option></option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}"
                                    @if($country->id === $job->country_id) selected @endif
                                    > {{$country->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        @error('country_id')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="city_id"> City</label>
                        <div class="input-container">
                            <i class="fa fa-city icon"></i>
                            <select name="city_id"  class="form-control @error('city_id') error @enderror" value="{{old('city_id')}}">
                            <option></option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}"
                                    @if($city->id === $job->city_id) selected @endif
                                    > {{$city->name}}</option>
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
                        <label for="status">Status</label>
                        <div class="input-container">
                            <i class="fas fa-thermometer-quarter icon"></i>
                            <select name="status" class="form-control @error('status') error @enderror" value="{{$job->status}}">
                            <option></option>
                            <option value="1" @if($job->status === 1) selected @endif>True</option>
                            <option value="0" @if($job->status === 0) selected @endif>False</option>
                        </select>
                        </div>
                        @error('status')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="vacancies">Vacancies</label>
                        <div class="input-container">
                            <i class="fas fa-user-graduate icon"></i>
                            <input type="text" name="vacancies" class="form-control @error('vacancies') error @enderror" value="{{$job->vacancies}}">
                        </div>
                        @error('vacancies')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="min_years_of_experience">Minimum Year Of Experience</label>
                        <div class="input-container">
                            <i class="fas fa-user-minus icon"></i>
                            <input type="text" name="min_years_of_experience" class="form-control @error('min_years_of_experience') error @enderror" value="{{$job->min_years_of_experience}}">
                        </div>
                        @error('min_years_of_experience')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="max_years_of_experience">Max Year Of Experience</label>
                        <div class="input-container">
                            <i class="fas fa-user-plus icon"></i>
                            <input type="text" name="max_years_of_experience" class="form-control @error('max_years_of_experience') error @enderror" value="{{$job->max_years_of_experience}}">
                        </div>
                        @error('max_years_of_experience')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="min_salary">Minimum Salary</label>
                        <div class="input-container">
                            <i class="fa fa-yen-sign icon"></i>
                            <input type="text" name="min_salary" class="form-control @error('min_salary') error @enderror" value="{{$job->min_salary}}">
                        </div>
                        @error('min_salary')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="max_salary">Maximum Salary</label>
                        <div class="input-container">
                            <i class="fa fa-pound-sign icon"></i>
                            <input type="text" name="max_salary" class="form-control @error('max_salary') error @enderror" value="{{$job->max_salary}}">
                      </div>
                        @error('max_salary')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>
                </div>



                <div class="form-group">
                    <label class="form-label-lg" for="skill">Select Skills</label><br>
                       <select name="skills[]" id="" multiple class="form-control">
                            @foreach($skills as $skill)
                                <option value="{{$skill->id}}"
                                    @foreach ($job->skills as $jobskill)
                                        @if ($skill->id == $jobskill->id)
                                            selected
                                        @endif
                                    @endforeach
                                    >{{$skill->name}}</option>
                            @endforeach
                       </select>
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

                <button class="btn btn-warning" type='submit'>Edit Job</button>
                <a class="btn btn-primary" href="{{route('all-jobs.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection
