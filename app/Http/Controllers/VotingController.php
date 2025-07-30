<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotingController extends Controller
{
    public function index()
    {
        $votes = Vote::all();
        return view('voting', compact('votes'));
    }
    
    public function create(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Vote::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return back()->with('success', 'Voting baru berhasil dibuat!');
    }
    
    public function submit(Request $request, Vote $vote)
    {
        $request->validate([
            'vote' => 'required|in:setuju,tidak'
        ]);
        
        if ($request->vote === 'setuju') {
            $vote->increment('setuju');
        } else {
            $vote->increment('tidak_setuju');
        }
        
        return back()->with('message', 'Terima kasih, suara Anda telah direkam.');
    }
    
    public function destroy(Vote $vote)
    {
        // Hanya pembuat voting atau admin yang bisa menghapus
        if (Auth::id() !== $vote->user_id && !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $vote->delete();
        return back()->with('success', 'Voting berhasil dihapus!');
    }
}

