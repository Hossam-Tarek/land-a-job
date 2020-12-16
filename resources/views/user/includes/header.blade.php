<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route("user") }}">
            <span class="ml-3 font-weight-bold">LAND A JOB</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right border-0" type="button"
                data-toggle="collapse" data-target="#navbar4">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbar4">
            <ul class="navbar-nav mr-auto pl-lg-4">
                <li class="nav-item px-lg-2">
                    <a class="nav-link" href="{{ route("user") }}">Jobs</a>
                </li>

                <li class="nav-item px-lg-2">
                    <a class="nav-link" href="#">Saved jobs</a>
                </li>

                <li class="nav-item px-lg-2">
                    <a class="nav-link" href="{{route('user.jobs' , auth()->id() )}}">Applications</a>
                </li>
            </ul>


            <ul class="navbar-nav ml-auto pl-lg-4">
                <li class="nav-item mx-2">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search jobs" aria-label="Search" size="30">
                        <button class="btn btn-success mx-2" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item px-lg-2 dropdown d-menu">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</a>

                    <div class="dropdown-menu shadow-sm sm-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">View profile</a>
                        <a class="dropdown-item" href="#">Edit profile</a>
                        <form action="{{ route("logout") }}" method="POST">
                            @csrf
                            <input type="submit" class="dropdown-item" value="Logout">
                        </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
