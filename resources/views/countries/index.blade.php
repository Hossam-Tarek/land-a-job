@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <a href="{{route('countries.create')}}" class="btn btn-success ">Add new Country</a>
        @if($countries->count()>0)
            <h1 class="text-center mb-3">All Countries</h1>
            <table class="table table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td class="text-right pr-5">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <td>{{$country->id}}</td>
                            <td>{{$country->name}}</td>
                            <td>
                                <form action="{{route('countries.destroy',$country)}}" method="POST" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('countries.edit',$country)}}" class="btn btn-primary float-right mr-1">Edit</a>
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
