@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
        @if($educations->count()>0)
        <div class="col-md-12 content">
            <h2 class="font-weight-bolder">Education</h2>
            @foreach($educations as $education)
                    <div class="experience">
                        <div class="font-weight-bolder">
                            <span class="pr-3">{{$education->field_of_study}}</span>
                            <a href="{{route('educations.edit',$education->id)}}" class="edit float-right"><i class="fas fa-edit"></i></a>
                            <form class="delete form-inline float-right" action="{{ route("educations.destroy", $education) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="delete pr-3 float-right"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                        <div>
                            <span class="d-block">at {{$education->organization}}</span>
                            <span class="pr-3">Grade: {{$education->grade}}</span>
                            <span>Degree: {{$education->degree}}</span>
                        </div>
                        <div>
                            <span class="pr-3">From: {{\Carbon\Carbon::parse($education->start_date)->format('M/Y')}}</span>
                            <span>To: {{\Carbon\Carbon::parse($education->end_date)->format('M/Y')}}</span>
                        </div>
                    </div>
                    <hr>
            @endforeach
            <a href="{{route('educations.create')}}" class="btn btn-primary p-2"><i class="fas fa-plus mr-2"></i>Add new education</a>
        </div>
        @else
            <div class="card-header text-center">
                <h2>no education yet</h2>
            </div>
        @endif
@endsection

