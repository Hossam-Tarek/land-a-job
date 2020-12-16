@extends("admin.layouts.master")
    @section("title", "All Companies ")
    @section('css')
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
    @endsection

    @section('content')

    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success my-5">
                {{session()->get('success')}}
            </div>
        @endif
    </div>

        <h1 class="text-center text-secondary mt-4">All Users</h1>
        <div class="data-table-responsiv">
            <div class="container my-5">
                <table id="table1" class="table table-bordered text-center table-hover">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center text-white">First Name</th>
                            <th class="text-center text-white">Last Name</th>
                            <th class="text-center text-white">Avatar </th>
                            <th class="text-center text-white">Role</th>
                            <th class="text-center text-white">Email</th>
                            <th class="text-center text-white">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td><img src="{{asset('avatar/'.$user->image)}}" alt="" class="user-image"></td>
                            <td> {{$user->role}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                    @if($user->role != 'admin')
                                        <form action="{{route('all-users.destroy',$user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
