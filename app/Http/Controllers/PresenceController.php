<?php

namespace App\Http\Controllers; // Add this line

use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Import the base Controller class

class PresenceController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $todayPresence = $user->presenceToday();
        $recentPresences = $user->presences()
            ->latest()
            ->take(10)
            ->get();
        
        return view('presence.index', compact('todayPresence', 'recentPresences'));
    }

    public function store()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        if ($user->presenceToday()) {
            return redirect()->back()->with('error', 'Anda sudah melakukan presensi hari ini');
        }
        
        Presence::create([
            'user_id' => $user->id,
            'tanggal' => now()->toDateString(), // Simpan sebagai string tanggal
            'waktu' => now()->format('H:i:s'),
            'hadir' => true,
        ]);
        
        return redirect()->back()->with('success', 'Presensi berhasil dicatat');
    }
}
