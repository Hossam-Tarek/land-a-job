
@extends("user.layouts.master")
@section("title", "Edit Certificate")
@section("style-sheets")
    <link rel="stylesheet" href="{{ url('/css/request_loading.css') }}">
    <link href="{{ asset('css/image-upload-with-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user/edit-user-profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-sm-12 col-md-6">
        <form action="{{route('certificates.update',$certificate)}}" method='post' enctype='multipart/form-data'>
                @csrf 
                @method('put')
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id"> 
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name='name' class="form-control @error('name') error @enderror" value="{{$certificate->name}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" class="form-control @error('organization') error @enderror" value="{{$certificate->organization}}">
                    @error('organization')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="awarded_date">awarded date</label>
                    <input type="date" name='awarded_date' class="form-control @error('awarded_date') error @enderror" value="{{$certificate->awarded_date}}">
                    @error('awarded_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="certificate_url">certificate_url</label>
                    <input type="text" name='certificate_url' class="form-control @error('certificate_url') error @enderror" value="{{$certificate->certificate_url}}">
                    @error('certificate_url')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <button class="btn btn-warning mr-3" type='submit'>Edit</button>
                <a class="btn btn-danger" href="{{route('user.edit')}}">Cancel</a>
            </form>
    </div>
</div>
@endsection