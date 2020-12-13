@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/experience.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
        @if($experiences->count()>0)
        <div class="col-md-12 content">
            <h2 class="font-weight-bolder">Work Experiences</h2>
            @foreach($experiences as $experience)

                    <div class="experience">
                        <div class="font-weight-bolder">
                            <span class="pr-3">{{$experience->title}}</span>
                            <span>at {{$experience->company}}</span>
                            <a href="{{route('experiences.edit',$experience->id)}}" class="edit float-right"><i class="fas fa-edit"></i></a>
                            <form class="delete form-inline float-right" action="{{ route("experiences.destroy", $experience) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="delete pr-3 float-right"><i class="fas fa-trash-alt"></i></button>
                                </form>
                        </div>
                        <hr>
                        <div>
                            <span class="pr-3">From: {{\Carbon\Carbon::parse($experience->start_date)->format('M/Y')}}</span>
                            <span>To: {{\Carbon\Carbon::parse($experience->end_date)->format('M/Y')}}</span>
                        </div>
                        
                    </div>

            @endforeach
            <a href="{{route('experiences.create')}}" class="btn btn-primary p-2"><i class="fas fa-plus mr-2"></i>Add new experience</a>
        </div>


        @else
            <div class="card-header text-center">
                <h2>no Experience yet</h2>
            </div>
        @endif
@endsection

