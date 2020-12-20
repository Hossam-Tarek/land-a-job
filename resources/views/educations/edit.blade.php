
@extends("user.layouts.master")
@section("title", "Edit Education")
@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-sm-12 col-md-6">
        <form action="{{route('educations.update',$education)}}" method='post' enctype='multipart/form-data'>
                @csrf 
                @method('put')
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id"> 
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" class="form-control @error('organization') error @enderror" value="{{$education->organization}}">
                    @error('organization')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">start_date</label>
                    <input type="date" name='start_date' class="form-control @error('start_date') error @enderror" value="{{$education->start_date}}">
                    @error('start_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">end_date</label>
                    <input type="date" name='end_date' class="form-control @error('end_date') error @enderror" value="{{$education->end_date}}">
                    @error('end_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="grade">grade</label>
                    <input type="text" name='grade' class="form-control @error('grade') error @enderror" value="{{$education->grade}}">
                    @error('grade')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="degree">degree</label>
                    <input type="text" name='degree' class="form-control @error('degree') error @enderror" value="{{$education->degree}}">
                    @error('degree')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="field_of_study">field_of_study</label>
                    <input type="text" name='field_of_study' class="form-control @error('field_of_study') error @enderror" value="{{$education->field_of_study}}">
                    @error('field_of_study')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5"></textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <button class="btn btn-warning" type='submit'>Edit</button>
                <a class="btn btn-danger" href="{{route('educations.index')}}">Cancel</a>
            </form>
    </div>
</div>
@endsection