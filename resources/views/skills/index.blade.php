@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{route('skills.create')}}" class="btn btn-success">Add new Skill</a>
        @if($skills->count()>0)
            <h1 class="text-center mb-3">All Skills</h1>
            <table class="table table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td>Name</td>
                        <td>Year Of Experience</td>
                        <td>Proficiency</td>
                        <td class="text-center">Actions</td>

                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                        <tr>
                            <td>{{$skill->name}}</td>
                            <td>{{$skill->year_of_experience}}</td>
                            <td>{{$skill->proficiency}}</td>
                            <td>
                                <form action="{{route('skills.destroy',$skill)}}" method="POST" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('skills.edit',$skill)}}" class="btn btn-primary float-right mr-1">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        @else
            <div class="card-header text-center">
                <h2>no Skills yet</h2>
            </div>
        @endif
@endsection
