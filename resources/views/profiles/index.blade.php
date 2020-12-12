@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div>
                <h1>All profiles</h1>

                <a href="{{ route("profiles.create") }}" class="btn btn-primary">Add Profile</a>
                <table class="table table-striped table-hover table-responsive mt-3 mb-3">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Gender</th>
                        <th>MinSalary</th>
                        <th>military_status</th>
                        <th>education_level</th>
                        <th>job_title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                            <tr>
                                <td>{{ ($profile->user->first_name).($profile->user->last_name) }}</td>
                                <td>{{ $profile->country->name}}</td>
                                <td>{{ $profile->city->name }}</td>
                                <td>{{ $profile->gender }}</td>
                                <td>{{ $profile->min_salary }}</td>
                                <td>{{ $profile->military_status }}</td>
                                <td>{{ $profile->education_level }}</td>
                                <td>{{ $profile->job_title }}</td>
                                <td>
                                    <a href= class="btn btn-primary">Show</a>
                                </td>
                                <td>
                                    <form action="{{ route("profiles.destroy", $profile) }}" method="POST">
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
