@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-sm-12 ">
             <div class=" offset-3 bg-light m-5 font-weight-bolder">
                        <div >{{$certificate['user_id']}}</div>
                        <div>{{$certificate['name'] }}</div>
                        <a>{{$certificate['certificate_url']}}</a>
               </div>
        </div>
    </div>
</div>
@endsection

