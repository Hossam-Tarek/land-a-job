@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>All cities</h1>

                <a href="{{ route("cities.create") }}" class="btn btn-primary">Add city</a>
                <table class="table table-striped table-hover table-responsive mt-3 mb-3">
                    <thead class="bg-secondary text-light">
                    <tr>
                        <th>City</th>
                        <th>Country</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->country->name }}</td>
                                <td>
                                    <a href="{{ route("cities.show", $city) }}" class="btn btn-primary">Show</a>
                                </td>
                                <td>
                                    <a href="{{ route("cities.edit", $city) }}" class="btn btn-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route("cities.destroy", $city) }}" method="POST">
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
