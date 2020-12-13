@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add Certificates</h1>
<div class="container col-sm-6">
    <form action="{{route('certificates.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name='name' >
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Enter Awarded Date</label>
            <input type="date" class="form-control" name='awarded_date' >
            @error('awarded_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Enter Organization</label>
            <input type="text" class="form-control" name='organization'  >
            @error('organization')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label >Enter Url</label>
            <input type="text" class="form-control" name='certificate_url'  >
            @error('certificate_url')
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
