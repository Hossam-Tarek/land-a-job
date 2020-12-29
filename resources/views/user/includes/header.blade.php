<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top">
    <div class="container">

        <a class="navbar-brand" href="@auth {{ route('user.index') }} @else khaledPage @endauth">
            <span class="ml-3 font-weight-bold">LAND A JOB</span>
        </a>

        <button class="navbar-toggler navbar-toggler-right border-0" type="button"
                data-toggle="collapse" data-target="#navbar4">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('job.search.index') }}">Jobs</a>
                </li>

                {{--                <li class="nav-item px-lg-2">--}}
                {{--                    <a class="nav-link" href="#">Saved jobs</a>--}}
                {{--                </li>--}}

                @auth
                    <li class="nav-item px-lg-2">
                        <a class="nav-link" href="{{route('user.jobs')}}">Applications</a>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav ml-auto pl-lg-4">
                @auth
                    <li class="nav-item px-lg-2 dropdown d-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</a>

                        <div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="{{Route('user.profile',auth()->user()->id)}}">View profile</a>
                            <a class="dropdown-item" href="{{Route('user.edit')}}">Edit profile</a>
                            <form action="{{ route("logout") }}" method="POST">
                                @csrf
                                <input type="submit" class="dropdown-item" value="Logout">
                            </form>
                            </a>
                        </div>
                    </li>
                @endauth

                @guest
                    <a class="nav-link" href="{{ route('login') }}"
                       class="text-sm text-gray-700 underline">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Join now</a>
                    <a class="nav-link px-2 bg-primary text-white rounded ml-2" href="{{ route('company-register') }}">
                        Employer?</a>
                    {{--                        <li class="nav-item px-lg-2 dropdown d-menu">--}}
                    {{--                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01"--}}
                    {{--                               data-toggle="dropdown"--}}
                    {{--                               aria-haspopup="true" aria-expanded="false">Register</a>--}}
                    {{--                            <div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="dropdown01">--}}
                    {{--                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--                                <a class="dropdown-item" href="{{ route('company-register') }}">{{ __('Register As Company') }}</a>--}}
                    {{--                            </div>--}}
                    {{--                        </li>--}}
                @endguest

            </ul>
        </div>
    </div>
</nav>
