@extends("layouts.app")

@section("content")
<a href="{{route('educations.create')}}" class="btn btn-success">Add Education</a>

        @if($educations->count()>0)
            <h1 class="text-center mb-3">All Educations</h1>
            <table class="table table-striped">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td>UserId</td>
                        <td>Organization</td>
                        <td>Start_date</td>
                        <td>End_date</td>
                        <td>Grade</td>
                        <td>Degree</td>
                        <td>Field Of Study</td>
                        <td>Description</td>
                        <td class="text-right"></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($educations as $education)
                        <tr>
                            <td>{{ ($education->user->first_name) . ($education->user->last_name) }}</td>
                            <td>{{ $education->organization }}</td>
                            <td>{{ $education->start_date }}</td>
                            <td>{{ $education->end_date }}</td>
                            <td>{{ $education->grade }}</td>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->field_of_study }}</td>
                            <td>{{ $education->description }}</td>
                            <td class="text-right">
                                <form action="{{ route("educations.destroy", $education) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                </td>
                                <td><a href="{{route('educations.edit',$education->id)}}" class="btn btn-primary mr-1 float-right">Edit Education</a><td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div class="card-header text-center">
            <h2>no Educations yet</h2>
        </div>
    @endif
@endsection
