
@extends("user.layouts.master")
@section("title", "Add Certificate")
@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-sm-12 col-md-6">
            <form action="{{route('certificates.store')}}" method='post' enctype='multipart/form-data'>
                @csrf 
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id"> 

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name='name' class="form-control @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" class="form-control @error('organization') error @enderror" value="{{old('organization')}}">
                    @error('organization')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="awarded_date">Awarded Date</label>
                    <input type="date" name='awarded_date' class="form-control @error('awarded_date') error @enderror" value="{{old('awarded_date')}}">
                    @error('awarded_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="certificate_url">Certificate Url</label>
                    <input type="text" name='certificate_url' class="form-control @error('certificate_url') error @enderror" value="{{old('certificate_url')}}">
                    @error('certificate_url')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <button class="btn btn-success" type='submit'>Add certificate</button>
                <a class="btn btn-danger" href="{{route('certificates.index')}}">Cancel</a>
            </form>
    </div>
</div>
@endsection