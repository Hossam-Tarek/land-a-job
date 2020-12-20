<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$user->first_name}} {{$user->last_name}}</title>
    <link rel="stylesheet" href="{{ asset('css/fontaswesme-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/user/main.css") }}">
</head>
<body>
<div class="container">
    <div class="row mt-5 ">
        <div class="col-lg-8 col-sm-12 mt-3   mx-auto ">
            <div class="row bg-light shadow-sm first-card p-3 card-profile-margin">

                <div class="col-lg-2 col-sm-12 my-auto d-flex justify-content-center ">
                    <img src="{{asset('avatar/'.$user->image)}}" width="110px" height="110px"
                         class="rounded-circle">
                </div>
                <div class="col-lg-10 col-sm-12  pt-2  ">
                    <h3 class="font-weight-bold hover-edit">{{$user->first_name}}  {{$user->last_name}}
                        @if (Auth::user())
                            <a href="#" class="edit-ancor"><i class="fas fa-pencil-alt edit-fontawsom"></i></a>
                        @endif
                    </h3>
                    <h6>{{$user->profile->job_title}} at {{$user->company->name}}
                        @if (Auth::user())
                            <a href="#" class="edit-ancor"><i class="fas fa-pencil-alt edit-fontawsom"></i></a>
                        @endif
                    </h6>
                    <p class="text-secondary user-profile-city  hover-edit">{{$user->profile->city->name}}
                        , {{$user->profile->country->name}}
                        @if (Auth::user())
                            <a href="#" class="edit-ancor"><i class="fas fa-pencil-alt edit-fontawsom"></i></a>
                        @endif
                    </p>
                    @foreach($user->skills()->get() as $index=>$us )
                        @if($index<5)
                            <span class="badge badge-info mb-1 px-2 py-1 hover-edit">{{$us->name}}</span>
                        @endif
                    @endforeach
                    @foreach($user->links()->get() as $us)
                        <div class="float-right">
                            <a href="{{$us->url}}" class="m-3"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{$us->url}}"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="row  card-profile-margin">
        @if (Auth::user())
            <div class="col-lg-8 mx-auto mt-4 user-info p-3">
                <div class="row profile-general-info-container">
                    <div class="col-md-6 col-sm-12 px-3 mb-3">
                        <div class="mx-3 pb-3">
                            <h4 class="text-secondary font-weight-bold mb-1">General Info:</h4>
                            <p class="text-secondary mb-0 ml-3">Minimum salary : {{$user->profile->min_salary}}</p>
                            <p class="text-secondary mb-0 ml-3">Education Level
                                : {{$user->profile->education_level}}</p>
                            <p class="text-secondary mb-0 ml-3">Gender : {{$user->profile->gender}}</p>
                            <p class="text-secondary mb-0 ml-3">Military Status
                                : {{$user->profile->military_status}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 px-3 pb-3">
                        <div class="mx-3">
                            <h4 class="text-secondary font-weight-bold mb-1">Contact Info :</h4>
                            @foreach($user->phoneNumbers()->get() as $us)
                                <p class="text-secondary mb-0 ml-3">
                                    <i class="mr-2 fas fa-mobile-alt"></i>{{$us->number}}</p>
                            @endforeach
                            <p class="text-secondary mb-0 ml-3"><i class="mr-2 fas fa-envelope"></i>{{$user->email}}</p>
                            <p class="text-secondary mb-0 ml-3"><i class="mr-2 fas fa-file-word"></i> Cv last update {{\Illuminate\Support\Carbon::now()->diffForHumans(\Illuminate\Support\Carbon::parse($user->profile->updated_at))}}
                                <a href="#" class=" text-decoration-none mr-2"> <i class="fas fa-upload"></i> Update</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto pt-4">
            <div class="row card-profile-margin">
                <div
                    class="col-lg-7 mr-lg-5 bg-light shadow-sm pt-4 pr-4 pl-4 first-card col-sm-12 work-experience-container">
                    <h6 class="font-weight-bold"><i class="mr-2 fas fa-briefcase fontawsom-profile"></i>Work Experience
                        @if(Auth::user())
                        <span class="offset-2 font-weight-light"><a href="#">+ Add New</a></span>
                        @endif
                    </h6>
                    @foreach($user->experiences()->get() as $experience)
                        <div class="pb-2 mb-2 px-2 ">
                            <a href="#" class="text-decoration-none">
                                {{$experience->title}} at {{$experience->company}}
                                <span class="font-italic text-secondary badge badge-light">internship...</span>
                            </a>
                            <p class="font-italic text-secondary years-exp mt-1 mb-0">From {{$experience->end_date}}
                                To {{$experience->start_date}}
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-4 bg-light shadow-sm p-3 mt-1 col-sm-12  first-card">
                    <h6 class="font-weight-bold">Skills</h6>
                    <p class="text-secondary">Tools and Fields of Expertise</p>
                    @foreach($user->skills()->get() as $us)
                        <span class="badge badge-info mb-1 px-2 py-1 hover-edit">{{$us->name}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mx-auto pt-4">
            <div class="row card-profile-margin">
                <div class="col-lg-7 mr-lg-5 bg-light shadow-sm p-3 first-card col-sm-12 ">
                    <h6 class="font-weight-bold"><i class="fas fa-graduation-cap fontawsom-profile mr-1"></i> Education
                       @if(Auth::user())
                        <span class="offset-3 font-weight-light"><a href="#">+ Add New</a> </span>
                        @endif
                    </h6>
                    @foreach($user->education()->get() as $education)
                        <p class="pt-2">
                            <a href="#" class="text-decoration-none">{{$education->degree}}
                                at {{$education->organization}}</a>
                        </p>
                        <p class="text-secondary font-italic years-exp"> {{\Illuminate\Support\Carbon::now()->diffForHumans(\Illuminate\Support\Carbon::parse($education->start_date))}}</p>
                    @endforeach
                </div>
                <div class="col-lg-4 bg-light  shadow-sm p-3 mt-1 col-sm-12 side-card-profile first-card">
                    <h6 class="font-weight-bold">Languages</h6>

                    @foreach($user->languages()->get() as $lang)
                        <span class="d-inline-block">{{$lang->name}}</span><br>
                        <span class="fa fa-star start-rating-checked"></span>
                        <span class="fa fa-star
                              @if($lang->pivot->proficiency == 'Intermediate'
                                    || $lang->pivot->proficiency == 'Fluent'
                                    || $lang->pivot->proficiency == 'Native speaker')
                            start-rating-checked @endif">
                        </span>
                        <span class="fa fa-star
                              @if($lang->pivot->proficiency == 'Fluent'
                                    || $lang->pivot->proficiency == 'Native speaker')
                            start-rating-checked @endif">
                        </span>
                        <span class="fa fa-star
                              @if($lang->pivot->proficiency == 'Native speaker')
                            start-rating-checked @endif">
                        </span>
                        <span class="text-muted d-inline-block mb-2">-- {{$lang->pivot->proficiency}}</span><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto pt-4 ">
            <div class="row card-profile-margin  ">
                <div class="col-lg-7 mr-lg-5 bg-light shadow-sm p-3 first-card col-sm-12 ">
                    <p class="text-center"><img src="{{asset('img/1.svg')}}" width="150px" height="100px"></p>
                    <p class="text-center font-weight-bold">Activities</p>
                    <p class="text-center font-italic text-secondary">Your volunteering and student activities</p>
                    @if(Auth::user())
                    <p class="text-center"><a class="btn  btn-primary ">+ Add Activites</a></p>
                    @endif
                </div>
                <div class="col-lg-4 bg-light  shadow-sm first-card pt-3 mt-1 ">
                    <h6 class="font-weight-bold pb-2"><i class="fas fa-certificate fontawsom-profile"></i> Training & Certifications</h6>
                    @foreach ($user->certificates()->get() as $item)
                        <h6>{{$item->name}}</h6>
                        <p class="text-secondary font-italic  years-exp mt-3">{{$item->organization}} -
                            <span>{{$item->awarded_date}}</span></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/user/main.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
</body>
</html>
