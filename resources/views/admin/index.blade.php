@extends('admin.layouts.master')
@section('title','Dashboard')

@section('content')
<div class="container">
    @if(session()->has('success'))
    <div class="alert alert-success my-5">
        {{session()->get('success')}}
    </div>
    @endif
    <h1 class="text-center">Dashboard</h1>
</div>
@endsection
