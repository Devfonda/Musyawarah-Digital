@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-4">📅 Agenda Musyawarah</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="/agenda" method="POST" class="mb-6 space-y-2">
        @csrf
        <input type="text" name="judul" placeholder="Judul agenda" class="w-full border p-2 rounded" required>
        <textarea name="deskripsi" placeholder="Deskripsi agenda" class="w-full border p-2 rounded" required></textarea>
        <input type="date" name="tanggal" class="w-full border p-2 rounded" required>
        <input type="time" name="waktu" class="w-full border p-2 rounded" required>
        <input type="text" name="tempat" placeholder="Tempat" class="w-full border p-2 rounded" required>
        <select name="status" class="w-full border p-2 rounded" required>
            <option value="aktif">Aktif</option>
            <option value="selesai">Selesai</option>
        </select>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Agenda</button>
    </form>

    <h2 class="text-xl font-semibold mt-6 mb-2">Daftar Agenda:</h2>
    <ul class="list-disc ml-5">
        @forelse($agendas as $agenda)
            <li>
                <span class="font-semibold">{{ $agenda->judul }}</span> 
                - {{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }},
                {{ $agenda->waktu }},
                {{ $agenda->tempat }},
                <span class="italic text-gray-500">{{ $agenda->status }}</span>
                <br>
                <span class="text-gray-700">{{ $agenda->deskripsi }}</span>
            </li>
        @empty
            <li>Belum ada agenda.</li>
        @endforelse
    </ul>
</div>
@endsection
