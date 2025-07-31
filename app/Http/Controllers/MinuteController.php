<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Minute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MinuteController extends Controller
{
    // Method untuk menampilkan form buat notulen
    public function create(Agenda $agenda)
    {
        // Pastikan agenda sudah selesai
        if ($agenda->status !== 'selesai') {
            return redirect()->route('agenda')->with('error', 'Hanya agenda yang sudah selesai yang bisa dibuatkan notulen.');
        }
        
        return view('minutes.create', compact('agenda'));
    }

    // Method untuk menyimpan notulen
    public function store(Request $request, Agenda $agenda)
    {
        $request->validate([
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            try {
                $filePath = $request->file('file')->store('public/minutes');
            } catch (\Exception $e) {
                Log::error('File store error: ' . $e->getMessage());
                return back()->with('error', 'Gagal mengunggah file.');
            }
        }

        // Pastikan user terautentikasi
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk membuat notulen');
        }

        try {
            Minute::create([
                'agenda_id' => $agenda->id,
                'content' => $request->content,
                'file_path' => $filePath,
                'created_by' => $user->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Minute creation error: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan notulen: ' . $e->getMessage());
        }

        return redirect()->route('agenda')
            ->with('success', 'Notulen berhasil disimpan!');
    }

    // Method untuk melihat detail notulen (tidak perlu auth)
    public function show(Minute $minute)
    {
        $minute->load('agenda', 'creator');
        return view('minutes.show', compact('minute'));
    }

    // Method untuk berbagi notulen (tidak perlu auth)
    public function share(Minute $minute)
    {
        $minute->load('agenda');
        return view('minutes.share', compact('minute'));
    }

    // Daftar semua notulen
    public function index()
    {
        $minutes = Minute::with(['agenda', 'creator'])
            ->latest()
            ->paginate(10);
        
        return view('minutes.index', compact('minutes'));
    }
}