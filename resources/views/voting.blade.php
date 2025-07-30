@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <!-- Form Buat Voting Baru -->
    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Buat Voting Baru</h2>
        <form method="POST" action="{{ route('voting.create') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Judul Voting</label>
                <input type="text" name="judul" placeholder="Masukkan judul voting" 
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Deskripsi Keputusan</label>
                <textarea name="deskripsi" rows="3" placeholder="Deskripsi keputusan yang akan divoting"
                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg hover:bg-indigo-700 transition">
                Mulai Voting
            </button>
        </form>
    </div>

    <!-- Daftar Voting Aktif -->
    <h2 class="text-2xl font-bold mb-4 text-zinc-50">Voting Aktif</h2>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('message'))
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    <div class="space-y-6">
        @forelse($votes as $vote)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $vote->judul }}</h3>
                <p class="text-gray-600 mb-4">{{ $vote->deskripsi }}</p>
                
                <div class="flex space-x-4 mb-6">
                    <div class="flex-1">
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-green-500" 
                                 style="width: {{ $vote->total() > 0 ? ($vote->setuju / $vote->total()) * 100 : 0 }}%"></div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-green-600">Setuju</span>
                            <span class="text-sm text-gray-500">{{ $vote->setuju }} suara</span>
                        </div>
                    </div>
                    
                    <div class="flex-1">
                        <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-red-500" 
                                 style="width: {{ $vote->total() > 0 ? ($vote->tidak_setuju / $vote->total()) * 100 : 0 }}%"></div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <span class="text-sm text-red-600">Tidak Setuju</span>
                            <span class="text-sm text-gray-500">{{ $vote->tidak_setuju }} suara</span>
                        </div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('voting.submit', $vote) }}">
                    @csrf
                    <div class="flex space-x-4">
                        <button type="submit" name="vote" value="setuju"
                                class="flex-1 bg-green-100 text-green-700 font-medium py-2.5 rounded-lg hover:bg-green-200 transition">
                            👍 Setuju
                        </button>
                        <button type="submit" name="vote" value="tidak"
                                class="flex-1 bg-red-100 text-red-700 font-medium py-2.5 rounded-lg hover:bg-red-200 transition">
                            👎 Tidak Setuju
                        </button>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-6 py-3 text-sm text-gray-500">
                Dibuat: {{ $vote->created_at->format('d M Y H:i') }} | Total Suara: {{ $vote->total() }}
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-lg p-8 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p class="text-gray-600">Belum ada voting aktif. Buat voting baru sekarang!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection