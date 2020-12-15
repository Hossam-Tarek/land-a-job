
@extends("admin.layouts.master")
@section("title", "All Companies ")
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
    <div class="container my-5">
        @if(session()->has('success'))
            <div class="alert alert-success my-5">
                {{session()->get('success')}}
            </div>
        @endif
        <h1 class="text-center text-secondary mt-4">All Countries </h1>
            <div class="data-table-responsiv ">
                <div class="container my-5">
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
            <tr>
                <th scope="col">title</th>
                <th scope="col">industry_category_id</th>
                <th scope="col"> Edit</th>
                <th scope="col"> Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jobtitles as $job)
                <tr>
                    <td><a href="{{route('job-titles.show',$job)}}">{{$job['title'] }}</a></td>
                    <td>{{$job->industryCategory->name}}</td>
                    <td>
                        <a  class="btn btn-primary float-right" href="{{route('job-titles.edit',$job)}}">Edit</a>
                    </td>
                    <td>
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

@section('script')
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#table1').DataTable();
        });
    </script>
@endsection
