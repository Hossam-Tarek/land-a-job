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
        <h1 class="text-center text-secondary mt-4">All Cities</h1>
        <table id="table1" class="table table-bordered text-center table-hover">
            <thead class="bg-secondary">
            <tr>
                <th class="text-center text-white">City</th>
                <th class="text-center text-white">Country</th>
                <th class="text-center text-white">Edit</th>
                <th class="text-center text-white">Delete</th>

            </tr>
            </thead>
            <tbody>
            @foreach($cities as $city)
                <tr>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->country->name }}</td>

                    <td>
                        <a href="{{ route("cities.edit", $city) }}" class="btn btn-secondary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route("cities.destroy", $city) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger" value="Delete">
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