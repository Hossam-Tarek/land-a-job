@extends('layouts.app')
@section('content')
<h1 class="text-center">Add Certificates</h1>
<div class="container col-sm-6">
    <form action="{{route('links.update',$link)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='name' value="{{$link->name}}">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group ">
            <label>Enter url</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='url' value="{{$link->url}}" >
            @error('url')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->first_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
