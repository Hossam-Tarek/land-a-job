

@extends('layouts.app')

@section('content')

    <h1 class="text-center bg-light p-3 ">Job-Titles</h1>
    <a class="btn btn-success offset-3 p-2 mb-3"  href="{{route('job-titles.create')}}" >Add New JobTitle</a>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">industry_category_id</th>
                    <th scope="col"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobtitles as $job)
                    <tr>
                        <td><a href="{{route('job-titles.show',$job)}}">{{$job['title'] }}</a></td>
                        <td>{{$job->industryCategory->name}}</td>
                        <td>
                            <a  class="btn btn-primary float-right" href="{{route('job-titles.edit',$job)}}">Edit</a>
                            <form action="{{route('job-titles.destroy',$job)}}" method="POST" class="float-right mr-2">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
