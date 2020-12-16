@extends("admin.layouts.master")
@section("title", "All Companies ")
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
<h1 class="text-center text-secondary mt-4">All Industry Categories</h1>
<div class="container">
    <a class="btn btn-primary" href="{{route('industry-categories.create')}}">Add industry category</a>
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
                @foreach($industryCategories as $industryCategory)
                <tr>
                    <td>{{ $industryCategory->name }}</td>
                    <td>
                        <a href="{{ route("industry-categories.edit", $industryCategory) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route("industry-categories.destroy", $industryCategory) }}" method="POST">
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