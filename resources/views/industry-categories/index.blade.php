@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">All industry categories</h1>

                <a href="{{ route("industry-categories.create") }}" class="btn btn-primary">Add industry category</a>
                <table class="table table-striped table-hover table-responsive mt-3 mb-3">
                    <thead class="bg-secondary text-light">
                    <tr>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($industryCategories as $industryCategory)
                        <tr>
                            <td>{{ $industryCategory->name }}</td>
                            <td>
                                <a href="{{ route("industry-categories.show", $industryCategory) }}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route("industry-categories.edit", $industryCategory) }}" class="btn btn-secondary">Edit</a>
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
    </div>
@endsection
