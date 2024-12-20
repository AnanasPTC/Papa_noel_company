<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
        ]);

        $userId = Auth::id();

        $existingLike = Like::where('sender_id', $userId)
            ->where('receiver_id', $request->receiver_id)
            ->first();

        if ($existingLike) {
            return redirect()->back()->with('info', 'Vous avez déjà aimé cet utilisateur.');
        }

        Like::create([
            'sender_id' => $userId,
            'receiver_id' => $request->receiver_id,
        ]);

        return redirect()->back()->with('success', 'Utilisateur aimé avec succès !');
    }

    public function destroy($id)
    {
        $like = Like::findOrFail($id);

        if ($like->sender_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Action non autorisée.');
        }

        $like->delete();

        return redirect()->back()->with('success', 'Like supprimé avec succès.');
    }
}
