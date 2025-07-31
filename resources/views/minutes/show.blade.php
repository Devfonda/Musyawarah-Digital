@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Notulen Musyawarah</h2>
                <a href="{{ route('minutes.share', $minute) }}" class="bg-gradient-to-r from-green-600 to-green-800 text-white px-4 py-2 rounded-full font-medium hover:from-green-700 hover:to-green-900 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    Bagikan
                </a>
            </div>
            
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Agenda:</h3>
                <p class="text-gray-700 bg-indigo-50 p-4 rounded-lg">{{ $minute->agenda->judul }}</p>
            </div>
            
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Isi Notulen:</h3>
                <div class="prose max-w-none bg-gray-50 p-6 rounded-lg">
                    {!! nl2br(e($minute->content)) !!}
                </div>
            </div>
            
            @if($minute->file_path)
            <div class="mb-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Lampiran:</h3>
                <a href="{{ Storage::url($minute->file_path) }}" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                    </svg>
                    Download Lampiran
                </a>
            </div>
            @endif
            
            <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                <div>
                    <p class="text-sm text-gray-600">
                        Dibuat oleh: <span class="font-medium">{{ $minute->creator->name }}</span>
                    </p>
                    <p class="text-sm text-gray-600">
                        Pada: {{ $minute->created_at->format('d M Y H:i') }}
                    </p>
                </div>
                {{-- Perbaikan: Ganti route agenda.show dengan agenda --}}
                <a href="{{ route('agenda') }}" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Agenda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection