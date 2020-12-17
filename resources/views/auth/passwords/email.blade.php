@extends('layouts.login')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')

    <body  style="background-image: url({{asset('img/8.jpg')}}); background-repeat: no-repeat; background-size: cover; image-resolution: from-image;">
    <div class="mt-5 ">
    <h3 class=" font-weight-bold mt-5 text-center site-name  ">LAND A JOB</h3>

    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card login-card ">

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label for="email" class="col-form-label  offset-3  ">{{ __('E-Mail Address') }}</label>

                        <div class="form-group row flex justify-content-center">

                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 ">
                            <div class="col-sm-8 mx-auto">
                                <button type="submit" class="btn btn-primary login-btn ">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>
@endsection
