@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-secondary text-light">
            <h4>Edit Education</h4>
        </div>

        <div class="card-body">
            <form action="{{route('educations.update',$education)}}" method='post' enctype='multipart/form-data'>
                @csrf 
                @method('put')
                <div class="form-group">
                <div class="form-group">
                    <label for="user_id">Select user email</label>
                    <select name="user_id"  class="form-control @error('user_id') error @enderror" value="{{old('user_id')}}">
                        @foreach($users as $user)
                            <option value="{{$user->id}}"
                                @if($user->id === $education->user_id) {{"selected"}} @endif
                            > {{$user->email}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization" class="form-control @error('organization') error @enderror" value="{{$education->organization}}">
                    @error('organization')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">start_date</label>
                    <input type="date" name='start_date' class="form-control @error('start_date') error @enderror" value="{{$education->start_date}}">
                    @error('start_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_date">end_date</label>
                    <input type="date" name='end_date' class="form-control @error('end_date') error @enderror" value="{{$education->end_date}}">
                    @error('end_date')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="grade">grade</label>
                    <input type="text" name='grade' class="form-control @error('grade') error @enderror" value="{{$education->grade}}">
                    @error('grade')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="degree">degree</label>
                    <input type="text" name='degree' class="form-control @error('degree') error @enderror" value="{{$education->degree}}">
                    @error('degree')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="field_of_study">field_of_study</label>
                    <input type="text" name='field_of_study' class="form-control @error('field_of_study') error @enderror" value="{{$education->field_of_study}}">
                    @error('field_of_study')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') error @enderror" name="description" id="content" cols="5" rows="5">{{old('description')}}</textarea>
                    @error('description')
                    <li class="text-error">{{$message}}</li>
                    @enderror
                </div>
                <button class="btn btn-success" type='submit'>Edit Education</button>
                <a class="btn btn-primary" href="{{route('educations.index')}}">Cancel</a>
            </form>
        </div>
    </div>
@endsection