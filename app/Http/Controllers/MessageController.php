<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return view("admin.contact-message", ["messages" => Message::paginate(4)]);
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'message_content' => 'required|min:5'
        ]);
        Message::create($request->all());
        return redirect(route('guest.index'))->withSuccess( 'Message you want show in View' );
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return back();
    }
    public function updateStatus(Request $request)
    {
        $message =Message::find($request["messageID"]);
        $message->update([
            "viewed_status" => $request["viewed_status"],
        ]);
    }
}
