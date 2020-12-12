@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Add a new industry category</h1>

                <form action="{{ route("industry-categories.store") }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Industry Category</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error("name") is-invalid @enderror"
                               value="{{ old("name") }}">

                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" name="submit"
                               value="Add industry category">
                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
