@extends('layouts.app')
@section('content')
    <h1 class="text-center">Single JobTitle</h1>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">industry_category_id</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$jobTitle['title']}}</th>
                        <th scope="row">{{$jobTitle['industry_category_id']}}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
