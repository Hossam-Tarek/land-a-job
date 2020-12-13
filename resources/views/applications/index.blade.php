@extends("layouts.app")

@section("content")
<a href="{{route('applications.create')}}" class="btn btn-success">Add new Application</a>
        @if($applications->count()>0)
            <h1 class="text-center mb-3">All Applications</h1>
            <table class="table table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td>jobId</td>
                        <td>status</td>
                        <td class="text-right">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->job_id}}</td>
                            <td>{{ $application->status }}</td>
                            <td class="text-right">
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
    @else
        <div class="card-header text-center">
            <h2>no Applications yet</h2>
        </div>
    @endif
@endsection
