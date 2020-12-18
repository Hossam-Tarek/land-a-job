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
    <div class="container-fluid" style="height: 658px; background: url({{asset('guest/category/8.jpg')}});background-repeat: no-repeat; background-size: cover;">
        <h1 class="">Navbar</h1>
        <div class="form-group search">
                <input class="form-control w-75 mx-auto p-4" type="text" name="search" id="">
        </div>
    </div>


    <div class="container mt-5">

        {{-- Latest Job   --}}
        <h1 class="my-5">Latest Job</h1>
        <div class="row">
                @foreach ($jobs as $index => $job)
                    @if($index < 8)
                        <div class="col-lg-3 col-sm-6 khaled">
                            <div class="card latest-job my-1">
                                <div class="card-body shadow">
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
                        <a href="{{route('user')}}" >See all new Jobs on Land A Job</a>
                    </div>
               </div>
        </div>



        {{--  Jobs By Career Level  --}}
        <h1 class="my-5">Jobs By Career Level</h1>
        <div class="row ">
            @foreach ($careerlevels as $index => $careerlevel)
                    <div class="col-lg-4 col-sm-12 my-3">
                        <div class="shadow">
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
                        <div class="col-lg-4 col-sm-12 my-3">
                            <div class="shadow">
                                <a href="#">
                                    <img class="career-level" src="{{asset('guest/category/'.$category[$index])}}" alt="Not Found">
                                </a>
                                <h5 class="position-absolute text-light text-bottom p-2">{{$industry->name}} Jobs</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>



        {{--  Browse Jobs by Location --}}
        <div class="jobs-by-category my-5">
            <h1 class="my-5">Browse Jobs by Location</h1>
            <div class="row ">
                @foreach ($cities as $index => $cit)
                    @if($index < 3)
                        <div class="col-lg-4 col-sm-12 my-3">
                            <div class="shadow">
                                <a href="#">
                                    <img class="career-level" src="{{asset('guest/city/'.$city[$index])}}" alt="Not Found">
                                </a>
                                <h5 class="position-absolute text-light text-bottom p-2">Jobs in {{$cit->name}}</h5>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>









    </div>



































<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{asset('js/user/main.js')}}"></script>
</body>
</html>
