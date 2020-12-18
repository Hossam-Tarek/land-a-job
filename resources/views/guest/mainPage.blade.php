<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{asset('css/user/mainPage.css')}}">
</head>
<body class="bg-white">
    <div class="container-fluid" id="interval" style="height: 658px; background: url({{asset('guest/category/13.jpg')}});background-repeat: no-repeat; background-size: cover;">
            <nav class="navbar navbar-expand-lg text-white">
                <h1><b><a class="navbar-brand text-white land-a-job" href="#">LAND A JOB</a></b></h1>
                <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="fas fa-bars pt-1"></i></span>
                </button>

                <div class="collapse navbar-collapse my-5" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto nav-font">
                    <li class="nav-item">
                      <a class="nav-link text-white font-weight-bolder" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bolder" href="#contactus">Contact us</a>
                      </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <a href="" class="btn  mr-sm-2 text-white nav-font mx-1"><i class="fas fa-sign-in-alt"></i> Log in</a>
                    <a href="" class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa fa-user mx-1"></i>Employer?</a>
                  </form>
                </div>
              </nav>


        <div class="container">
            <div class="form-group search row">
                <div class="col-lg-12 mb-3 ">
                    <h2 class="mx-auto text-white font-weight-bolder d-flex justify-content-center">Find the Best Jobs in Egypt</h2>
                    <h5 class="mx-auto text-white  font-weight-bolder my-3 d-flex justify-content-center">Searching for vacancies & career opportunities? WUZZUF helps you in your job search in Egypt
                    </h5>
                </div>
                <div class="col-lg-12">
                   <form action="" class="index-search-form">
                        <input class="form-control w-75 mx-auto p-4" type="text" name="search" id="searchbox"
                        placeholder="Search jobs (e.g. Work from Home)">
                        <a href="#" class="btn btn-danger search-button" name="">Search Jobs </a>
                   </form>
                </div>
            </div>
        </div>

    </div>
    <div class="container mt-5">
        {{-- Latest Job   --}}
        <h1 class="my-5 ">Latest Job</h1>
        <div class="row">
                @foreach ($jobs as $index => $job)
                    @if($index < 8)
                        <div class="col-lg-3 col-sm-6 khaled">
                            <div class="card latest-job my-2">
                                <div class="card-body box-shad">
                                    <h5 class="card-title"><a href="">{{$job->title}}</a></h5>
                                    <span class="card-text">{{$job->company->name}}</span>
                                    <span> - {{$job->city->name}}</span>
                                    <p class="card-text"><small class="text-muted">{{\Illuminate\Support\Carbon::now()->diffForHumans(\Illuminate\Support\Carbon::parse($job->created_at))}} Ago</small></p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
               <div class="col-sm-12">
                    <div class="float-right my-3">
                        <a href="#" >See all new Jobs on Land A Job</a>
                    </div>
               </div>
        </div>

        {{--  Jobs By Career Level  --}}
        <h1 class="my-5">Jobs By Career Level</h1>
        <div class="row ">
            @foreach ($careerlevels as $index => $careerlevel)
                    <div class="col-lg-4 col-sm-12 my-3">
                        <div class="box-shad">
                            <a href="#">
                                <img class="career-level" src="{{asset('guest/career/'.$career[$index])}}" alt="Not Found">
                            </a>
                            <h5 class="position-absolute text-light text-bottom p-2">{{$careerlevel->name}}</h5>
                        </div>
                    </div>
            @endforeach
        </div>


        {{--  Browse Jobs by Category --}}
        <div class="jobs-by-category my-5">
            <h1 class="my-5">Browse Jobs by Category</h1>
            <div class="row ">
                @foreach ($industries as $index => $industry)
                    @if($index < 3)
                        <div class="col-lg-4 col-sm-12 my-4">
                            <div class="box-shad">
                                <a href="#">
                                    <img class="career-level" src="{{asset('guest/category/'.$category[$index])}}" alt="Not Found">
                                </a>
                                <h5 class="position-absolute text-light text-bottom p-2">{{$industry->name}} Jobs</h5>
                            </div>
                        </div>
                    @elseif($index < 15)
                        <div class="col-lg-4 my-2 collapse show" id="category-jobs">
                            <h5 class=" text-bottom p-2"><a href="#">{{$industry->name}}Jobs</a></h5>
                        </div>
                    @endif
                @endforeach
                <div class="col-sm-12">
                <button class=" btn btn-primary  w-100 d-lg-none justify-content-center d-flex my-2 " type="button" data-toggle="collapse" data-target="#category-jobs" aria-controls="category-jobs" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    show more
                </button>
                </div>
            </div>
        </div>
        {{--  Browse Jobs by Location --}}
        <div class="jobs-by-category my-5">
            <h1 class="my-5">Browse Jobs by Location</h1>
            <div class="row ">
                @foreach ($cities as $index => $cit)
                    @if($index < 3)
                        <div class="col-lg-4 col-sm-12 my-4">
                            <div class="box-shad">
                                <a href="#">
                                    <img class="career-level" src="{{asset('guest/city/'.$city[$index])}}" alt="Not Found">
                                </a>
                                <h5 class="position-absolute text-light text-bottom p-2">Jobs in {{$cit->name}}</h5>
                            </div>
                        </div>
                    @elseif($index < 15)
                    <div class="col-lg-4 my-2 collapse show" id="city-jobs">
                        <h5 class=" text-bottom p-2"><a href="#">Jobs in {{$cit->name}}</a></h5>
                    </div>
                    @endif
                @endforeach
              <div class="col-sm-12">
                <button class=" btn btn-primary  w-100 d-lg-none justify-content-center d-flex my-2 " type="button" data-toggle="collapse" data-target="#city-jobs" aria-controls="city-jobs" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    show more
                </button>
              </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white text-lg-start">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-4 col-sm-12  mb-md-0 p-5 text-white text-left">
                        <h2 class="font-weight-bolder text-uppercase mb-4">land a job</h2>
                        <h5>Employers and Recruiters, go to our</h5>
                        <a href="#" class="text-white">RECRUITMENT SERVICES.</a>
                        <h2 class="font-weight-bolder mt-5">Follow us</h2>
                        <a href="#" class="font-awoesm text-muted" id="website-facebook"><i class="fab fa-facebook-f pr-3"></i></a>
                        <a href="#" class="font-awoesm text-muted" id="website-twiter"><i class="fab fa-twitter pr-3"></i></a>
                        <a href="#" class="font-awoesm text-muted" id="website-linkedin"><i class="fab fa-linkedin-in pr-3"></i></a>
                        <a href="#" class="font-awoesm text-muted" id="website-whatsapp"><i class="fab fa-whatsapp pr-3"></i></a>
                    </div>

                    <div class="col-lg-4 col-sm-12  mb-md-0  pl-5 pt-lg-5">
                        <h3 class="font-weight-bolder text-left">Links</h3>
                        <div class="row">
                            <div class="col-sm-6 text-left ">
                                <ul class="list-unstyled mb-0 ">
                                    <li class="my-lg-2">
                                        Career Resources
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">LAND A JOB coaches</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">About us</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Recruiters Services</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">RSS</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Jobs in KSA</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Jobs in UAE</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-left">
                                <ul class="list-unstyled mb-0">
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Parteners</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Site Map</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Contact us</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Privacy</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Condition</a>
                                    </li>
                                    <li class="my-lg-2">
                                        <a href="#!" class="text-white">Contact us</a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4  mb-4 mb-md-0  p-5 text-left" id="contactus">
                        <h3 class="font-weight-bolder text-left mb-3">Contact us</h3>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input class="footer-input form-control">
                        </div>
                        <div class="form-group">
                            <label for="Name">Email</label>
                            <input class="footer-input form-control">
                        </div>
                        <div class="form-group">
                            <label for="Name">Message</label>
                            <textarea class="footer-input form-control"></textarea>
                        </div>
                        <button class="btn btn-primary w-25">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{asset('js/user/main.js')}}"></script>
</body>
</html>
