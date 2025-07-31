@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <h2 class="text-3xl font-bold text-gray-900 mb-6">Bagikan Notulen</h2>
            
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-8">
                <p class="text-blue-700">
                    Notulen untuk agenda: <strong>{{ $minute->agenda->judul }}</strong>
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Bagikan via Link -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Bagikan via Link</h3>
                    <div class="flex">
                        <input 
                            type="text" 
                            value="{{ route('minutes.show', $minute) }}" 
                            id="share-link"
                            class="flex-grow px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            readonly>
                        <button 
                            onclick="copyToClipboard()"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-r-lg transition duration-300">
                            Salin
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">Bagikan link ini ke anggota lain</p>
                </div>
                
                <!-- Bagikan via Email -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Bagikan via Email</h3>
                    <form>
                        <div class="mb-4">
                            <label for="emails" class="block text-gray-700 text-sm font-bold mb-2">Email Penerima:</label>
                            <input 
                                type="text" 
                                id="emails"
                                placeholder="email1@contoh.com, email2@contoh.com"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button 
                            type="button"
                            class="bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                            Kirim Notulen
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('minutes.show', $minute) }}" class="text-indigo-600 hover:text-indigo-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Notulen
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard() {
    const copyText = document.getElementById("share-link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    alert("Link berhasil disalin: " + copyText.value);
}
</script>
@endsection