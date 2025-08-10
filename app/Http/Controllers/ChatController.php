<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return view('chat', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'content' => strip_tags($request->input('content')),
        ]);

        return redirect()->route('chat.index');
    }
}
