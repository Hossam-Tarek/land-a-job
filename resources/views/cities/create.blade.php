@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Add new city</h1>

                <form action="{{ route("cities.store") }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <select class="form-select" name="country_id">
                            <option selected>Choose a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ old("country_id") == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error("country_id")
                            <p class="help text-danger">{{ $errors->first("country_id") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error("name") is-invalid @enderror"
                               name="name" value="{{ old("name") }}">
                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Add city</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
