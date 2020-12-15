@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{asset('css/message.css')}}">
@endsection
@section('content')
<div class="container message-container">
@if($messages->count()>0)
        <div class="content">
            <h3 class="text-center mb-3 mt-3">Messages</h3>
            @foreach($messages as $message)
                    <div class="message">
                        <div class="font-weight-bolder">
                            <h4 class="pr-3 email">From :{{$message->email}}</h4>
                            <p>{{\Carbon\Carbon::parse($message->created_at)->format('D/M/Y')}}</p>
                            <div>
                                <input type="hidden" value="{{$message->id}}">
                                <button class="inline-block ml-2 mr-2 view" value="{{$message->viewed_status}}"><i id="" class="fas eyeIconStatus {{($message->viewed_status == 0)?'fa-eye-slash':'fa-eye'}}"></i></button>
                                <form class="delete d-inline" action="{{route('messages.destroy', $message)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="delete pr-3"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="message_content m-3">
                            <p>{{$message->message_content}}</p>

                        </div>                    
                    </div>
            @endforeach
        </div>
        @else
            <div class="card-header text-center">
                <h2>no Messages</h2>
            </div>
        @endif
</div>
@endsection