@extends("user.layouts.master")
@section("title", "Edit Experience")
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
            <form action="{{route('experiences.update',$experience)}}" method='post' enctype='multipart/form-data'>
                    @csrf 
                    @method('put')
                    <input type="hidden" value="{{auth()->user()->id}}" name="user_id"> 
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') error @enderror" value="{{$experience->title}}">
                        @error('title')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="industry_category_id">Select industry category</label>
                        <select name="industry_category_id"  class="form-control @error('industry_category_id') error @enderror" value="{{$experience->industryCategory->name}}">
                            @foreach($industryCategories as $industryCategory)
                                <option value="{{$industryCategory->id}}"> {{$industryCategory->name}}</option>
                            @endforeach
                        </select>
                        @error('industry_category_id')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="career_level_id">Select career level</label>
                        <select name="career_level_id"  class="form-control @error('career_level_id') error @enderror" value="{{$experience->careerLevel->name}}">
                            @foreach($careerLevels as $careerLevel)
                                <option value="{{$careerLevel->id}}"> {{$careerLevel->name}}</option>
                            @endforeach
                        </select>
                        @error('career_level_id')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" name="company" class="form-control @error('company') error @enderror" value="{{$experience->company}}">
                        @error('company')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start date</label>
                        <input type="date" name='start_date' class="form-control @error('start_date') error @enderror" value="{{$experience->start_date}}">
                        @error('start_date')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_date">End date</label>
                        <input type="date" name='end_date' class="form-control @error('end_date') error @enderror" value="{{$experience->end_date}}">
                        @error('end_date')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{$experience->description}}</textarea>
                        @error('description')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>

                    <button class="btn btn-warning mr-2" type='submit'>Edit</button>
                    <a class="btn btn-danger" href="{{route('user.edit')}}">Cancel</a>
                </form>

        </div>
    </div>
</div>
@endsection

