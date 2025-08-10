<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ChatController extends Controller
{
    /**
     * Apply authentication middleware to all routes in this controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the chat view with the latest 50 messages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get latest 50 messages with their user, ordered oldest first
        $messages = Message::with('user')
            ->latest()
            ->take(50)
            ->get()
            ->reverse();

        return view('chat', ['messages' => $messages]);
    }

    /**
     * Handle storing a new chat message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'content' => strip_tags($request->input('content')),
        ]);

        return redirect('/chat');
    }
}
