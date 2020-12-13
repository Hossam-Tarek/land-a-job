@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>City: {{ $city->name }}</h3>
                <h5>Country: {{ $city->country->name }}</h5>

                <a href="{{ route("cities.edit", $city) }}" class="btn btn-primary">Edit city</a>
            </div>
        </div>
    </div>
@endsection
