@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add Certificates</h1>
<div class="container col-sm-6">
    <form action="{{route('jobTitles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group ">
            <label>Enter Name</label>
            <input type="text" class="form-control"  name='title' >
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
     <div class="form-group">
         <select name="industry_category_id" class="form-control">
             @foreach($industry as $ind)
                 <option value="{{$ind->id}}">{{$ind->name}}</option>
             @endforeach
         </select>
     </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
