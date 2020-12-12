@extends('layouts.app')
@section('content')
    <a class="btn btn-success offset-3 p-2 mb-3"  href="{{route('users.create')}}" >Add New User</a>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">First_Name</th>
                    <th scope="col">Last_Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td><a href="{{route('users.show',$user['id'])}}">{{$user['first_name']}}</a></td>
                        <td>{{$user['last_name'] }}</td>
                        <td>{{$user['email']}}</td>
                        <td><img src='{{asset('avatar/'.$user['image'])}}' width=100px height="100px"></td>
                        <td>
                            <a href="{{route('users.edit',$user['id'])}}" class="btn btn-primary float-right ">Edit</a>
                            <form action="{{route("users.destroy",$user['id'])}}" method="POST" class="float-right mr-4">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >Delete</button>
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
