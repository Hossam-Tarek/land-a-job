@extends("admin.layouts.master")
@section("title", "All Companies ")
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
@endsection

@section('content')
    <div class="my-5">
        @if(session()->has('success'))
            <div class="alert alert-success my-5">
                {{session()->get('success')}}
            </div>
        @endif
            @if($careerLevels->count()>0)
        <h1 class="text-center text-secondary mt-4">All Career Levels</h1>
        <div class="data-table-responsiv ">
            <div class="container my-5">
                <table id="table1" class="table table-bordered text-center table-hover">
                    <thead class="bg-secondary">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td class="text-right pr-5">Edit</td>
                        <td class="text-right pr-5">Delete</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($careerLevels as $careerLevel)
                        <tr>
                            <td>{{$careerLevel->id}}</td>
                            <td>{{$careerLevel->name}}</td>
                            <td>
                                <form action="{{route('careerLevels.destroy',$careerLevel)}}" method="POST" class="float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('careerLevels.edit',$careerLevel)}}" class="btn btn-primary float-right mr-1">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @else
                    <div class="card-header text-center">
                        <h2>no CareerLevel yet</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#table1').DataTable();
        });
    </script>
@endsection
