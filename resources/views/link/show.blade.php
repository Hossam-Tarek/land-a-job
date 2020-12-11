@extends('layouts.app')
@section('content')
    <a class="btn btn-success offset-3 p-2 mb-3"  href="{{route('links.create')}}" >Add New Link</a>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">url</th>
                    <th scope="col"> Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <td>{{$link['name']}}</td>
                        <td><a href="{{route('links.show',$link)}}">{{$link['url']}}</a></td>
                        <td>
                            <a  class="btn btn-primary float-right" href="{{route( 'links.edit',$link)}}">Edit</a>
                            <form action="{{route('links.destroy',$link)}}" method="POST" class="float-right mr-3">
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
