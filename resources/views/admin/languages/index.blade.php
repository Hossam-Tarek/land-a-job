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

        <h1 class="text-center text-secondary mt-4">All Languages</h1>
        <div class="data-table-responsiv ">
            <div class=" my-5">
                <table id="table1" class="table table-bordered text-center table-hover">
                    <thead class="bg-secondary">
                    <tr>
                        <td>Name</td>
                        <td >Edit</td>
                        <td >Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->name }}</td>
                            <td>
                                <a href="{{ route("languages.edit", $language) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route("languages.destroy", $language) }}" method="POST">
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
