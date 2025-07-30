<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        return view('agenda.index', compact('agendas'));
    }

    public function store(Request $request)
    {

    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'tempat' => 'required|string|max:255',
        'status' => 'required|in:aktif,selesai',
    ]);

    Agenda::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'tempat' => $request->tempat,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Agenda berhasil disimpan!');
    }
}
