@extends('layouts.login')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')

<body style="background-image: url({{asset('img/8.jpg')}}); background-repeat: no-repeat; background-size: cover; image-resolution: from-image;" >
<h3 class=" font-weight-bold pt-5 text-center site-name ">LAND A JOB</h3>
<div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card w-auto p-0  m-0">
                    <h2 class="text-center border-bottom w-50 mx-auto my-3 ">Welcome back</h2>
                    <div class="form-group row mb-0 ">
                        <div class="col-sm-12 ">
                            <a class="btn btn-lg btn-google"  ><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Sign in with Google</a>
                        </div>
                    </div>

                    <div class=" text-center">
                        <div class="row">
                            <div class="col-4 offset-1">
                               <hr >
                            </div>
                            <p class="col-2">or</p>
                            <div class="col-4">
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label for="email" class="col-form-label  lab">{{ __('E-Mail Address') }}</label>
                            <div class="form-group row flex justify-content-center">
                                    <input id="email" placeholder="Enter Email" type="email" class="form-control w-75   @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            <label for="password" class=" col-form-label  lab">Password</label>
                            <div class="form-group row flex justify-content-center">
                                    <input id="password" placeholder="Enter Password" type="password" class="form-control  w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>
                            <div class="form-group ml-5  ">
                                <div class="col-md-12 ">
                                    <div class="form-check">
                                        <input class="form-check-input mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label ml-5" for="remember">
                                      Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 ">
                                <div class="col-sm-12 ">
                                    <button type="submit" class="btn btn-primary ">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link btn-google" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
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
                            <a href="{{route('register')}}" class="btn btn-primary btn-google">
                                {{ __('register') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
