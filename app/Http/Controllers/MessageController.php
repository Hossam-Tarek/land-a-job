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
