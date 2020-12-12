@extends('layouts.app')
@section('content')
<h1 class="text-center">Add Phone</h1>
<div class="container col-sm-6">
    <form action="{{route('phones.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <label>Enter phone</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='number' >
            @error('phone')
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
