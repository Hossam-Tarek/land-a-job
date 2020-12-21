@extends("company.layouts.master")
@section("title", "All Jobs")
@section('style-sheets')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
@if(session()->has('success'))
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
<a href="{{route('all-jobs.create')}}" class="btn btn-success my-3 float-right">Add new Job</a>
@if($jobs->count() > 0)
<div class=" mt-4 data-table-responsiv">
    <table id="table1" class="table table-striped table-bordered text-center table-hover">
        <thead>
            <tr>
                <th class="text-center">Title</th>
                <th class="text-center">Type</th>
                <th class="text-center">Industry </th>
                <th class="text-center">Career level</th>
                <th class="text-center">City</th>
                <th class="text-center">Country</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
            <tr>
                <td><a href="{{route('all-jobs.show',$job->id)}}">{{$job->title}}</a></td>
                <td>{{$job->jobType->name}}</td>
                <td>{{$job->industryCategory->name}}</td>
                <td>{{$job->careerLevel->name}}</td>
                <td>{{$job->city->name}}</td>
                <td>{{$job->country->name}}</td>
                <td>
                    <a href="{{route('all-jobs.edit',$job->id)}}" class="btn btn-warning mr-1">Edit</a>
                </td>
                <td>
                    <form action="{{route('all-jobs.destroy',$job->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger float-right">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
    <h2 class="text-center text-muted">There is no Jobs yet</h2>
@endif
@endsection

@section('scripts')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable()
        $("#nav-search").prepend($("#table1_filter"));
        $("#table1_filter input")
            .addClass("form-control d-inline-block w-auto")
            .attr("placeholder", "Search jobs");
        $("#table1_filter label").css("margin", "0");
        document.querySelector("#table1_filter label").childNodes[0].remove();
    });
</script>
@endsection
