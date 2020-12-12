@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add Links</h1>
<div class="container col-sm-6">
    <form action="{{route('links.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='name' >
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group ">
            <label>Enter url</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='url' >
            @error('url')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}" name="user_id">{{$user->first_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
