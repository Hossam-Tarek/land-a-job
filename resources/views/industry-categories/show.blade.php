@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Industry category</h1>

                <h3>Name: {{ $industryCategory->name }}</h3>

                <a href="{{ route("industry-categories.edit", $industryCategory) }}"
                   class="btn btn-primary">Edit industry category</a>
            </div>
        </div>
    </div>
@endsection
