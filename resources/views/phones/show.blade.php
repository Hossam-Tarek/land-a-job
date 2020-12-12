@extends('layouts.app')
@section('content')
    <a class="btn btn-success offset-3 p-2 mb-3"  href="{{route('phones.create')}}" >Add New Phone</a>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">url</th>
                    <th scope="col">name</th>
                    <th scope="col" class="text-center"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($phones as $phone)
                    <tr>
                        <td>{{$phone['number']}}</td>
                        <td>{{$phone->user->first_name}}</td>
                        <td>
                            <a  class="btn btn-primary float-right" href="{{route( 'phones.edit',$phone)}}">Edit</a>
                            <form action="{{route('phones.destroy',$phone)}}" method="POST"  class="float-right  mr-4">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
