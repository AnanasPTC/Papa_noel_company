<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userId = auth()->id();

        $messages = \App\Models\Message::with(['sender', 'receiver'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($message) use ($userId) {
                $message->is_sent = ($message->sender_id == $userId);
                return $message;
            });

        $users = \App\Models\User::where('id', '!=', $userId)->get();

        return view('pages.message.index', compact('messages', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:500',
        ]);

        \App\Models\Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('message.index')->with('success', 'Message envoyé avec succès !');
    }


}
