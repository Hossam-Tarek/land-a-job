@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">All number of employees</h1>

                <a href="{{ route("number-of-employees.create") }}"
                   class="btn btn-primary">Add a number of employees</a>
                <table class="table table-striped table-hover table-responsive mt-3 mb-3">
                    <thead>
                    <tr>
                        <th>Min</th>
                        <th>Max</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($numberOfEmployees as $numberOfEmployee)
                            <tr>
                                <td>{{ $numberOfEmployee->min }}</td>
                                <td>{{ $numberOfEmployee->max }}</td>
                                <td>
                                    <a href="{{ route("number-of-employees.show", $numberOfEmployee) }}"
                                       class="btn btn-primary">Show</a>
                                </td>
                                <td>
                                    <a href="{{ route("number-of-employees.edit", $numberOfEmployee) }}"
                                       class="btn btn-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route("number-of-employees.destroy", $numberOfEmployee) }}" method="POST">
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
