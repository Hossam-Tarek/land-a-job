@extends("company.layouts.master")
@section("style-sheets")
    <link rel="stylesheet" href="{{asset('css/application/application.css')}}">
@endsection
@section("content")
@if($users->count()>0)
            <div class="d-flex flex-row justify-content-center align-items-center">
                <div class="applications_count-container pt-2 pb-2 pl-4 pr-4 d-inline-block mb-4">
                    <h1 class="font-weight-bolder job_title">{{$job->title}}</h1> 
                    <span class="d-block city">{{$job->city->name}} , {{$job->country->name}}</span>
                    <div class="applications_statistic"> 
                        <ul class="list-unstyled p-1 applicants-count d-inline-block">
                            <li class="d-inline-block border-right">
                                <p>{{$job->vacancies}}</p>
                                <p class="vacancy">vacanc @if($job->vacancies <= 1) y @else ies @endif</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p>{{$viewedApplicationCount}}</p>
                                <p>Viewed</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p>{{$SelectedApplicationCount}}</p>
                                <p class="text-info">selected</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p>{{$notSelectedApplicationCount}}</p>
                                <p class="text-danger">not selected</p>
                            </li>
                            <li class="d-inline-block border-right">
                                <p>{{$inConsiderationApplicationCount}}</p>
                                <p class="text-success">in consediration</p>
                            </li>
                            <li class="d-inline-block">
                                <p>{{$appliedApplicationCount}}</p>
                                <p class="text-primary">applied</p>
                            </li>
                        </ul>
                </div>
            </div>
            </div>

            @foreach($users as $user)
                <div class="application mb-4">
                    <span class="status font-weight-bolder pr-1 pl-1 d-block mb-4">{{$user->pivot->status}}</span>
                    <div class="font-weight-bolder mt-4">
                        <a href="" data-user-id="{{$user->id}}" data-job-id="{{$job->id}}" class="viewd text-decoration-none user-name"><span class="pr-3 dblock">{{$user->first_name . $user->last_name}}</span></a>
                        <span class="d-block">{{$user->email}}</span>
                    </div>
                    <hr>
                    <a class="pr-3 btn btn-primary change-status" data-toggle="modal" 
                    data-target="#changestatus{{$user->id}}">Change status</a>
                    <div class="modal fade" id="changestatus{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Change status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('company.job.user.status.update',[$user->id , $job->id])}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="status">          
                                                        <option value="applied" @if($user->pivot->status == "Applied") {{"selected"}}  @endif>Applied</option>
                                                        <option value="viewed" @if($user->pivot->status == "Viewed") {{"selected"}}  @endif>Viewed</option>
                                                        <option value="selected" @if($user->pivot->status == "selected") {{"selected"}}  @endif>Selected</option>
                                                        <option value="In consideration" @if($user->pivot->status == "In consideration") {{"selected"}}  @endif> In consideration</option>
                                                        <option value="Not selected" @if($user->pivot->status == "Not selected") {{"selected"}}  @endif>Not selected</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Submit</button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
@else
    <div class="card-header text-center">
        <h2>no Applications yet</h2>
    </div>
@endif
@endsection


