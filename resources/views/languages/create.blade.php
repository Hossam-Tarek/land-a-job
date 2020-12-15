@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Add new language</h1>

                <form action="{{ route("languages.store") }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control @error("name") is-invalid @enderror"
                               name="name" value="{{ old("name") }}">
                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Add language</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
