@extends('layouts.login')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')

    <body style="background-image: url({{asset('img/8.jpg')}}); background-repeat: no-repeat; background-size: cover; image-resolution: from-image;" >
    <h3 class=" font-weight-bold pt-5 text-center site-name ">LAND A JOB</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-0">
                        <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role" value="company">
                            <label for="name" class="col-form-label  lab ">First Name</label>
                            <div class="form-group row flex justify-content-center">

                                <input id="first_name" placeholder="First-Name" type="text" class="form-control w-75 @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <label for="name" class="col-form-label lab">Last Name</label>
                            <div class="form-group row flex justify-content-center">
                                <input id="last_name" type="text" placeholder="Last-Name" class="form-control w-75 @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class=" col-form-label lab">{{ __('E-Mail Address') }}</label>
                            <div class="form-group row flex justify-content-center">
                                <input id="email" type="email" placeholder="E-Mail" class="form-control w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password" class=" col-form-label lab">{{ __('Password') }}</label>
                            <div class="form-group row flex justify-content-center">

                                <input id="password" type="password" placeholder="Password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password-confirm" class=" col-form-label lab">{{ __('Confirm Password') }}</label>
                            <div class="form-group row flex justify-content-center">
                                <input id="password-confirm" placeholder="Confirm-Password" type="password" class="form-control w-75" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group row flex justify-content-center">
                                <div class="custom-file w-75">
                                    <label for="image" class=" custom-file-label ">Upload Image</label>
                                    <input id="image" type="file" class="custom-file-input  @error('image') is-invalid @enderror" name="image">
                                </div>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">

                                <button type="submit" class="btn btn-primary btn-google" >
                                    {{ __('Register As Company') }}
                                </button>
                            </div>

                            <div class=" text-center">
                                <div class="row">
                                    <div class="col-4 offset-1">
                                        <hr>
                                    </div>
                                    <p class="col-2">or</p>
                                    <div class="col-4">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('login')}}" class="btn btn-primary btn-google">
                                {{ __('Login') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
