@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{route('jobTypes.create')}}" class="btn btn-success ">Add new jobTypes</a>
        @if($jobTypes->count()>0)
            <h1 class="text-center mb-3">All jobTypes</h1>
            <table class="table table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td class="text-right pr-5">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobTypes as $jobType)
                        <tr>
                            <td>{{$jobType->id}}</td>
                            <td>{{$jobType->name}}</td>
                            <td>
                                <form action="{{route('jobTypes.destroy',$jobType)}}" method="POST" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('jobTypes.edit',$jobType->id)}}" class="btn btn-primary float-right mr-1">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        @else
            <div class="card-header text-center">
                <h2>no jobTypes yet</h2>
            </div>
        @endif
@endsection
