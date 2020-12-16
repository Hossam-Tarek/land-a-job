@extends("admin.layouts.master")
@section("title", "All Companies ")
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
<div class=" my-5">
    @if(session()->has('success'))
    <div class="container alert alert-success my-5">
        {{session()->get('success')}}
    </div>
    @endif
    <h1 class="text-center text-secondary mt-4">All Countries </h1>
    <div class="container">
        <a class="btn btn-primary" href="{{route('countries.create')}}">Add country</a>
    </div>
    <div class="data-table-responsiv ">
        <div class="container mb-5 mt-3">
            <table id="table1" class="table table-bordered text-center table-hover">

                <thead class="bg-secondary">
                    <tr>
                        <th class="text-center text-white">Country Name</th>
                        <th class="text-center text-white">Edit</th>
                        <th class="text-center text-white">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $country)
                    <tr>
                        <td>{{$country->name}}</td>
                        <td>
                            <a href="{{route('countries.edit',$country)}}" class="btn btn-warning ">Edit</a>

                        </td>
                        <td>
                            <form action="{{route('countries.destroy',$country)}}" method="POST">
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
</div>
@endsection

@section('script')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/datatable.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#table1').DataTable();
    });
</script>
@endsection