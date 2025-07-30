<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Agenda; 
use App\Models\User;
use Carbon\Carbon; 

class DashboardController extends Controller
{
    public function index()
    {
        $latestVote = Vote::latest()->first();
        
        $latestAgendas = Agenda::where('status', 'aktif')
                               ->orderBy('tanggal', 'desc')
                               ->take(3)
                               ->get();
        
        // Hitung statistik
        $stats = [
            'users' => User::count(),
            'active_agendas' => Agenda::where('status', 'aktif')->count(),
            'completed_votes' => Vote::count(),
        ];
        
        return view('dashboard', compact('latestVote', 'latestAgendas', 'stats'));
    }
}