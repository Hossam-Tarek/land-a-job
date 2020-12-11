@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">All companies</h1>

                <a href="{{ route("companies.create") }}" class="btn btn-primary">Add new company</a>
                <table class="table table-striped table-hover table-responsive mt-3 mb-3">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Industry category</th>
                        <th>Founded date</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Logo</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->industryCategory->name }}</td>
                            <td>{{ $company->founded_date }}</td>
                            <td>{{ $company->city->name }}</td>
                            <td>{{ $company->country->name }}</td>
                            <td><img src="{{ asset("avatar/".$company->logo) }}" alt="company logo"></td>
                            <td>
                                <a href="{{ route("companies.show", $company) }}" class="btn btn-primary">Show</a>
                            </td>
                            <td>
                                <a href="{{ route("companies.edit", $company) }}" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route("companies.destroy", $company) }}" method="POST">
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
