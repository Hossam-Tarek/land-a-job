@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Add a new number of employees</h1>

                <form action="{{ route("number-of-employees.store") }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="min">Min</label>
                        <input type="number" name="min" id="min"
                               class="form-control @error("min") is-invalid @enderror"
                               value="{{ old("min") }}">

                        @error("min")
                        <p class="help text-danger">{{ $errors->first("min") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="max">Max</label>
                        <input type="number" name="max" id="max"
                               class="form-control @error("max") is-invalid @enderror"
                               value="{{ old("max") }}">

                        @error("max")
                        <p class="help text-danger">{{ $errors->first("max") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" name="submit"
                               value="Add number of employees">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
