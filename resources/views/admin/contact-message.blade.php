@extends('admin.layouts.master')
@section('title','Contact messages')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/message.css')}}">
@endsection
@section('content')
<div class="container message-container">
    @if($messages->count()>0)
    <div class="content row justify-content-around mt-5">
        @foreach($messages as $message)
        <div class="message col-12 col-md-8 col-xlg-6 mx-3 mb-5">
            <div class="font-weight-bolder">
                <p class="email d-inline-block">From: {{$message->email}}</p>
                <p class="d-md-inline-block float-right d-none d-sm-block">{{$message->created_at->diffForHumans()}}</p>
                <p>{{\Carbon\Carbon::parse($message->created_at)->format('D/M/Y')}}</p>
                <div>
                    <input type="hidden" value="{{$message->id}}">
                    <button class="ml-3 view status-btn" value="{{$message->viewed_status}}">
                        <i id="" class="fas {{($message->viewed_status == 0)?'fa-eye-slash':'fa-eye'}}"></i>
                    </button>
                    <form class="delete d-inline" action="{{route('admin.messages.destroy', $message)}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="delete ml-3 status-btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="message_content m-3">
                <p class="m-0">{{$message->message_content}}</p>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center paginate mb-4 col-12">
            {!! $messages->links() !!}
        </div>
    </div>
</div>
@else
<div class="row align-items-center mt-5">
    <div class="text-center p-4 no-message offset-md-4 col-md-4">
        <h2 class="text-danger">No messages</h2>
    </div>
</div>
@endif
@endsection
