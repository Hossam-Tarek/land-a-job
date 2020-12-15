@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="mb-4">All languages</h1>

                <a href="{{ route("languages.create") }}" class="btn btn-primary">Add new language</a>
                <table class="table mt-3 mb-3">
                    <thead class="bg-secondary text-light">
                    <tr>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <td>{{ $language->name }}</td>
                            <td>
                                <a href="{{ route("languages.edit", $language) }}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route("languages.destroy", $language) }}" method="POST">
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
