@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 p-6 bg-white rounded-xl shadow">
    <h1 class="text-2xl font-bold mb-4">📅 Agenda Musyawarah</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-8">
        <h2 class="text-xl font-semibold mb-4">Tambah Agenda Baru</h2>
        <form action="{{ route('agenda.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="judul" class="block text-gray-700 font-medium mb-1">Judul Agenda</label>
                    <input type="text" name="judul" id="judul" placeholder="Judul agenda" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
                <div>
                    <label for="tempat" class="block text-gray-700 font-medium mb-1">Tempat</label>
                    <input type="text" name="tempat" id="tempat" placeholder="Tempat" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
                <div>
                    <label for="tanggal" class="block text-gray-700 font-medium mb-1">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
                <div>
                    <label for="waktu" class="block text-gray-700 font-medium mb-1">Waktu</label>
                    <input type="time" name="waktu" id="waktu" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
                <div>
                    <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" id="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <option value="aktif">Aktif</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-medium mb-1">Deskripsi Agenda</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi agenda" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
            </div>
            <button type="submit" class="bg-gradient-to-r from-indigo-600 to-indigo-800 text-white font-medium px-6 py-3 rounded-lg hover:from-indigo-700 hover:to-indigo-900 transition duration-300">Simpan Agenda</button>
        </form>
    </div>

    <div class="mt-12">
        <h2 class="text-xl font-semibold mb-6">Daftar Agenda:</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Judul</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tanggal & Waktu</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tempat</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="py-3 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($agendas as $agenda)
                    <tr>
                        <td class="py-4 px-6">
                            <div class="font-medium text-gray-900">{{ $agenda->judul }}</div>
                            <div class="text-gray-600 text-sm mt-1">{{ $agenda->deskripsi }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="text-gray-900">{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d M Y') }}</div>
                            <div class="text-gray-600">{{ $agenda->waktu }}</div>
                        </td>
                        <td class="py-4 px-6 text-gray-700">{{ $agenda->tempat }}</td>
                        <td class="py-4 px-6">
                            @if($agenda->status == 'aktif')
                                <span class="px-3 py-1 text-sm bg-green-100 text-green-800 rounded-full">Aktif</span>
                            @else
                                <span class="px-3 py-1 text-sm bg-gray-100 text-gray-800 rounded-full">Selesai</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 space-x-2">
                            @if($agenda->status == 'selesai')
                                @if($agenda->minute)
                                    <a href="{{ route('minutes.show', $agenda->minute) }}" class="inline-flex items-center px-3 py-1 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Lihat Notulen
                                    </a>
                                @else
                                    <a href="{{ route('minutes.create', $agenda) }}" class="inline-flex items-center px-3 py-1 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Buat Notulen
                                    </a>
                                @endif
                            @else
                                <span class="text-gray-500 text-sm">Belum selesai</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-700">
                            Belum ada agenda.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection