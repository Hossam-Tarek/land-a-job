@extends("admin.layouts.master")
@section("title", "All job types")
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
<div class="mt-3 mb-2">
    @if(session()->has('success'))
    <div class="container alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
</div>
<h1 class="text-center text-secondary mt-4">All Job Types</h1>
<div class="container">
    <a class="btn btn-primary" href="{{route('jobTypes.create')}}">Add job type</a>
</div>
<div class="data-table-responsiv ">
    <div class="container mb-5 mt-3">
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
                <tr>
                    <td>Name</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach($jobTypes as $jobType)
                <tr>
                    <td>{{$jobType->name}}</td>
                    <td>
                        <a href="{{route('jobTypes.edit',$jobType->id)}}" class="btn btn-warning ">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('jobTypes.destroy',$jobType)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
@endsection
