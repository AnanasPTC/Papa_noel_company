<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
    ]);

    $userId = Auth::id();
    $receiverId = $request->receiver_id;

    $existingLike = Like::where('sender_id', $userId)
        ->where('receiver_id', $receiverId)
        ->first();

    if ($existingLike) {
        $existingLike->delete();
        return response()->json(['liked' => false], 200);
    } else {
        Like::create([
            'sender_id' => $userId,
            'receiver_id' => $receiverId,
        ]);
        return response()->json(['liked' => true], 200);
    }
}

}
