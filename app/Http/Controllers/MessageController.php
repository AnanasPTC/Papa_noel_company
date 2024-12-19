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
    
        $messages = Message::with(['sender', 'receiver'])
            ->where(function ($query) use ($userId) {
                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($message) use ($userId) {
                $message->is_sent = ($message->sender_id == $userId);
                return $message;
            });
    
        $unreadNotifications = Message::where('receiver_id', $userId)
            ->where('is_read', false)
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $users = \App\Models\User::where('id', '!=', $userId)->get();
    
        return view('pages.message.index', compact('messages', 'users', 'unreadNotifications'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:65535',
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
            'is_read' => false,
        ]);

        return redirect()->route('message.index')->with('success', 'Message envoyé avec succès !');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        return redirect()->route('message.index')->with('success', 'Message supprimé avec succès.');
    }

    public function getNotifications()
    {
        $userId = auth()->id();

        $notifications = Message::where('receiver_id', $userId)
            ->where('is_read', false)
            ->with('sender')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($notifications);
    }

    public function markAllAsRead()
    {
        $userId = auth()->id();

        Message::where('receiver_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }
}
