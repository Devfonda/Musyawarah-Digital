<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Events\NewChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        // Ambil 50 pesan terbaru
        $messages = Chat::with('user')->latest()->take(50)->get()->reverse();
        return view('chat', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $chat = Chat::create([
            'user_id' => $user->id,
            'message' => $request->message,
        ]);

        // Broadcast event
        event(new NewChatMessage($user, $request->message));

        return response()->json(['status' => 'Message sent!']);
    }
}