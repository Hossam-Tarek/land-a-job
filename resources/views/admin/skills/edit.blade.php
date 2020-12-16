@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section("content")
<div class="mt-5">
    <div class="col-8 offset-2 pt-3 ">
        <div class="card my-5 ">
            <div class="card-header bg-secondary text-light">
                <h4>Edit skill</h4>
            </div>
            <div class="card-body">
                <form action="{{route('skills.update',$skill)}}" method='post'>
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" name='name' class="form-control admin-input @error('name') error @enderror" value="{{$skill->name}}">
                        @error('name')
                        <li class="text-error">{{$message}}</li>
                        @enderror
                    </div>
                    <button class="btn btn-warning" type='submit'>Edit skill</button>
                    <a class="btn btn-danger ml-2" href="{{route('skills.index')}}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection