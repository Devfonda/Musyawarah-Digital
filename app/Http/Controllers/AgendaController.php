<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        // Tambahkan eager loading untuk relasi minute
        $agendas = Agenda::with('minute')->latest()->get();
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

        Agenda::create($request->all());

        return redirect()->route('agenda')
            ->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function destroy(Agenda $agenda)
    {
        // Hanya agenda selesai yang bisa dihapus
        if ($agenda->status !== 'selesai') {
            return redirect()->route('agenda')
                ->with('error', 'Hanya agenda yang sudah selesai yang dapat dihapus');
        }

        // Hapus agenda
        $agenda->delete();

        return redirect()->route('agenda')
            ->with('success', 'Agenda berhasil dihapus');
    }
}
