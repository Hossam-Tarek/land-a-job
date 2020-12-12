@extends('layouts.app')
@section('content')
    <h1 class="text-center">Single Phone</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">phone</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$phoneNumber}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
