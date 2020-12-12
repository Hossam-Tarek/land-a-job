@extends('layouts.app')
@section('content')
<h1 class="text-center">Update {{$phone->number}}</h1>
<div class="container col-sm-6">
    <form action="{{route('phones.update',$phone->id)}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='number' value="{{$phone->number}}">
            @error('number')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <select name="user_id" class="form-control">
                @foreach($users as $u)
                    <option value="{{$u->id}}">{{$u->first_name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
