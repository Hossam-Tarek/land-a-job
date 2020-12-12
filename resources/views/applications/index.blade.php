@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div>
                <h1>All applications</h1>
                <a href="{{ route("applications.create") }}" class="btn btn-primary">Add Application</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>jobId</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr>
                                <td>{{ $application->job_id}}</td>
                                <td>{{ $application->status }}</td>
                                <td>
                                    <form action="{{ route("applications.destroy", $application) }}" method="POST">
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
