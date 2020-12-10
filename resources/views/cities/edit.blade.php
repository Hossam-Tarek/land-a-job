@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Edit city</h1>

                <form action="{{ route("cities.update", $city) }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="form-group mb-3">
                        <select class="form-select" name="country_id">
                            <option selected>Choose a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ (old("country_id") ?? $city->country->id) == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error("country_id")
                        <p class="help text-danger">{{ $errors->first("country_id") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error("name") is-invalid @enderror"
                               name="name" value="{{ old("name") ?? $city->name }}">
                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Edit City">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
