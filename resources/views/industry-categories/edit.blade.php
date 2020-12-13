@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-5">
                <h1 class="mb-4">Add a new industry category</h1>

                <form action="{{ route("industry-categories.update", $industryCategory) }}" method="POST">
                    @csrf
                    @method("PUT")

                    <div class="form-group mb-3">
                        <label for="name">Industry Category</label>
                        <input type="text" name="name" id="name"
                               class="form-control @error("name") is-invalid @enderror"
                               value="{{ old("name") ?? $industryCategory->name }}">

                        @error("name")
                        <p class="help text-danger">{{ $errors->first("name") }}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Edit industry category</button>
                        <a href="{{ url()->previous() }}" class="btn btn-danger ml-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
