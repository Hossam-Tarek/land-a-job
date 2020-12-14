@extends("layouts.app")
@section('css')
    <link rel="stylesheet" href="{{asset('css/application/application.css')}}">
@endsection
@section("content")
@if($applications->count()>0)
            <h3 class="left-align mb-3 border-right">Applications</h1>
            <div class="applications_count pt-2 pb-2 pl-4 pr-4 d-inline-block mb-4">
                <span class="font-weight-bolder">{{$applications->count()}}</span> 
                <span class="d-block">Applications</span>
            </div>

            @foreach($applications as $application)
                <div class="application mb-4">
                    <span class="status font-weight-bolder pr-1 pl-1 d-block mb-4">{{$application->status}}</span>
                    <div class="font-weight-bolder mt-4">
                        <a href="{{route('profiles.show',$application->user_id)}}" class="text-decoration-none user-name"><span class="pr-3 dblock">{{$application->user->first_name . $application->user->last_name}}</span></a>
                        <span class="d-block">at {{$application->user->profile->job_title}}</span>
                    </div>
                    <hr>
                    <a class="pr-3 btn btn-primary change-status" data-toggle="modal" 
                    data-target="#changestatus{{$application->id}}">Change status</a>
                    <div class="modal fade" id="changestatus{{$application->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Change status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('application.updatestatus',['id'=> $application->id])}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" id="status">          
                                                        <option value="applied">Applied</option>
                                                        <option value="viewed">Viewed</option>
                                                        <option value="selected">Selected</option>
                                                        <option value="In consideration"> In consideration</option>
                                                        <option value="Not selected">Not selected</option>
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
