@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-4">Buat Notulen untuk Agenda: {{ $agenda->judul }}</h2>
            
            <form method="POST" action="{{ route('minutes.store', $agenda) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Notulen:</label>
                    <textarea name="content" id="content" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Lampiran (opsional):</label>
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('file')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Simpan Notulen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection