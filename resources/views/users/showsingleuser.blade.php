@extends('layouts.app')
@section('content')
    <h1 class="text-center">Single User</h1>
<div class="text-center bg-light"></div>
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
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['first_name']}}</td>
                        <td>{{$user['last_name'] }}</td>
                        <td>{{$user['email']}}</td>
                        <td><img src='{{asset('avatar/'.$user['image'])}}' width=100px height="100px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
