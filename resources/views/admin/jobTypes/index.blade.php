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
        <h1 class="text-center text-secondary mt-4">All JobTypes</h1>
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td class="text-right pr-5">Edit</td>
                <td class="text-right pr-5">Delete</td>
            </tr>
            </thead>
            <tbody>
            @foreach($jobTypes as $jobType)
                <tr>
                    <td>{{$jobType->id}}</td>
                    <td>{{$jobType->name}}</td>
                    <td>
                        <a href="{{route('jobTypes.edit',$jobType->id)}}" class="btn btn-warning float-right mr-1">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('jobTypes.destroy',$jobType)}}" method="POST" class="float-right">
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
