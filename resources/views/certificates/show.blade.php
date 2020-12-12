@extends('layouts.app')
@section('content')
    <a class="btn btn-success offset-3 p-2 mb-3"  href="{{route('certificates.create')}}" >Add New Certificate</a>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">user_id</th>
                    <th scope="col">name</th>
                    <th scope="col">certificate_url</th>
                    <th scope="col"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $c)
                    <tr>
                        <th scope="row"><a href="{{route('certificates.show',$c)}}">{{$c['user_id']}}</a></th>
                        <td>{{$c['name'] }}</td>
                        <td>{{$c['certificate_url']}}</td>
                        <td>
                            <a  class="btn btn-primary float-right " href="{{route('certificates.edit',$c)}}">Edit</a>
                            <form action="{{route('certificates.destroy',$c)}}" method="POST" class="float-right  mr-4">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >Delete</button>
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
