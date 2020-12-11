@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Number of employees</h1>
                <h3>Min: {{ $numberOfEmployee->min }}</h3>
                <h3>Max: {{ $numberOfEmployee->max }}</h3>

                <a href="{{ route("number-of-employees.edit", $numberOfEmployee) }}"
                   class="btn btn-primary">Edit number of employees</a>
            </div>
        </div>
    </div>
@endsection
