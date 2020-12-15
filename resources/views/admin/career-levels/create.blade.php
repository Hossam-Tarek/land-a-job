@extends('admin.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-8 mx-auto pt-3 ">
                <div class="card ">
                    <div class="card-header bg-secondary text-light">
                        <h4 class="text-center">Add new careerLevels</h4>
                    </div>

        <div class="card-body">
            <div action="{{route('careerLevels.store')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="Name" class="offset-1">careerLevel Name</label>
                    <input type="text" name='name' class="form-control w-75 h-25 mx-auto @error('name') error @enderror" value="{{old('name')}}">
                    @error('name')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <div class="text-center">
                <button class="btn btn-success" type='submit'>Add New CareerLevels</button>
                <a class="btn btn-primary" href="{{route('careerLevels.index')}}">Cancel</a>
            </div>
            </form>
        </div>
    </div>
@endsection
