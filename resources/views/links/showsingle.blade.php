@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$link['name']}}</th>
                    <th scope="row">{{$link['url']}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
