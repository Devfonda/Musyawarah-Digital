@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <!-- Header Section with Background Image -->
    <div class="relative rounded-2xl overflow-hidden mb-12">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 to-indigo-700 opacity-90"></div>
        <div class="relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-10 py-16 px-8">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl mb-6">
                        Selamat Datang di <span class="text-indigo-300">Musyawarah Digital</span>
                    </h1>
                    <p class="text-xl text-indigo-100 max-w-2xl mx-auto lg:mx-0">
                        Platform terpadu untuk mengelola agenda, melakukan voting, dan berinteraksi secara efisien.
                    </p>
                    <div class="mt-8 flex justify-center lg:justify-start">
                        <a href="#features" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-indigo-900 bg-white hover:bg-indigo-50 transition-all duration-300 transform hover:scale-105">
                            Mulai Jelajahi
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="relative w-full max-w-md">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform rotate-1">
                            <img src="{{ asset('images/balaidesa.jpg') }}" alt="Musyawarah di Balai Desa" class="w-full h-auto object-cover rounded-2xl">
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-white rounded-xl p-3 shadow-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-100 rounded-full p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <p class="ml-2 text-sm font-medium text-gray-700">Gotong Royong Digital</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Cards -->
    <div id="features" class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <!-- Agenda Navigation Card -->
        <div class="bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-xl overflow-hidden transform transition duration-300 hover:scale-[1.02] hover:shadow-2xl border border-indigo-100">
            <div class="p-8 flex items-center">
                <div class="flex-shrink-0 mr-6">
                    <div class="bg-indigo-100 rounded-full p-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Kelola Agenda</h2>
                    <p class="text-gray-600 mb-5">Atur jadwal musyawarah dan kegiatan penting lainnya dengan mudah.</p>
                    <a href="{{ route('agenda') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 transition duration-300 transform hover:scale-105">
                        Tambahkan Agenda
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Voting Navigation Card -->
        <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-xl overflow-hidden transform transition duration-300 hover:scale-[1.02] hover:shadow-2xl border border-green-100">
            <div class="p-8 flex items-center">
                <div class="flex-shrink-0 mr-6">
                    <div class="bg-green-100 rounded-full p-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="flex-grow">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Voting</h2>
                    <p class="text-gray-600 mb-5">Lakukan pengambilan keputusan secara transparan dan digital.</p>
                    <a href="{{ route('voting') }}" class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-green-600 to-green-800 hover:from-green-700 hover:to-green-900 transition duration-300 transform hover:scale-105">
                        Buat Voting Baru
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid: Latest Voting and Latest Agendas -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
        <!-- Latest Voting Results -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900">Hasil Voting Terbaru</h2>
                <a href="{{ route('voting') }}" class="text-indigo-600 hover:text-indigo-800 text-lg font-medium flex items-center transition duration-300">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            @if($latestVote)
                <div class="bg-gradient-to-br from-gray-50 to-white p-6 rounded-xl border border-gray-200 shadow-sm">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-3">{{ $latestVote->judul }}</h3>
                    <p class="text-gray-700 mb-5 leading-relaxed">{{ $latestVote->deskripsi }}</p>

                    <div class="space-y-4">
                        @php
                            $total = $latestVote->setuju + $latestVote->tidak_setuju;
                            $setujuPercent = $total > 0 ? round(($latestVote->setuju / $total) * 100) : 0;
                            $tidakPercent = $total > 0 ? round(($latestVote->tidak_setuju / $total) * 100) : 0;
                        @endphp

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-medium text-green-700 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Setuju
                                </span>
                                <span class="text-lg font-bold text-green-700">{{ $setujuPercent }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-500 ease-out" style="width: {{ $setujuPercent }}%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-medium text-red-700 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Tidak Setuju
                                </span>
                                <span class="text-lg font-bold text-red-700">{{ $tidakPercent }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-gradient-to-r from-red-400 to-red-600 h-3 rounded-full transition-all duration-500 ease-out" style="width: {{ $tidakPercent }}%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <p class="text-gray-600 text-sm">Total suara: <span class="font-semibold">{{ $total }}</span></p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ \Carbon\Carbon::parse($latestVote->created_at)->diffForHumans() }}
                        </span>
                    </div>
                </div>
            @else
                <div class="bg-gradient-to-br from-yellow-50 to-white border border-yellow-200 rounded-xl p-8 text-center">
                    <div class="inline-flex items-center justify-center bg-yellow-100 rounded-full p-4 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-yellow-800 mb-3">Belum Ada Voting</h3>
                    <p class="text-yellow-700 max-w-md mx-auto">Silakan buat voting baru untuk memulai pengambilan keputusan bersama.</p>
                    <div class="mt-6">
                        <a href="{{ route('voting') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-yellow-500 to-yellow-700 hover:from-yellow-600 hover:to-yellow-800 transition duration-300">
                            Buat Voting Pertama
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Latest Agendas -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                <h2 class="text-3xl font-bold text-gray-900">Agenda Terbaru</h2>
                <a href="{{ route('agenda') }}" class="text-indigo-600 hover:text-indigo-800 text-lg font-medium flex items-center transition duration-300">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            @if($latestAgendas->count() > 0)
                <div class="space-y-6">
                    @foreach($latestAgendas as $agenda)
                    <div class="border-l-4 border-indigo-500 pl-5 py-4 bg-gradient-to-r from-gray-50 to-white rounded-lg shadow-sm hover:shadow-md transition duration-300">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $agenda->judul }}</h3>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ \Carbon\Carbon::parse($agenda->tanggal)->diffForHumans() }}
                            </span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($agenda->tanggal)->format('d F Y') }}, {{ $agenda->waktu }} WIB</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $agenda->tempat }}</span>
                        </div>
                        <p class="text-gray-700 mt-3 text-base line-clamp-2">{{ $agenda->deskripsi }}</p>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 bg-gradient-to-br from-gray-50 to-white rounded-xl border border-gray-200">
                    <div class="inline-flex items-center justify-center bg-indigo-100 rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Agenda</h3>
                    <p class="text-gray-600 max-w-md mx-auto mb-6">Tambahkan agenda baru untuk memulai perencanaan kegiatan bersama.</p>
                    <a href="{{ route('agenda') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-700 hover:to-indigo-900 transition duration-300">
                        Tambah Agenda
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Statistics and Developer Info -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <!-- Developer Info -->
        <div class="bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-xl p-8 border border-indigo-100">
            <h3 class="text-3xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Tentang Developer</h3>
            <ul class="mb-6 text-gray-700 text-lg space-y-3">
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-3 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span><strong>Nama:</strong> Kelompok 4</span>
                </li>
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-3 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span><strong>Email:</strong> <a href="mailto:Kelompok4@gmail.com" class="text-blue-600 hover:text-blue-800 underline transition duration-300">Kelompok4@gmail.com</a></span>
                </li>
                <li class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mr-3 mt-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                    <span><strong>Github:</strong> <a href="https://github.com/devfonda" class="text-blue-600 hover:text-blue-800 underline" target="_blank" rel="noopener noreferrer">devfonda</a></span>
                </li>
            </ul>
            <p class="text-gray-600 leading-relaxed border-t border-gray-200 pt-6 mt-6">
                Aplikasi ini dirancang untuk memfasilitasi musyawarah digital, dilengkapi dengan fitur chat real-time, pengelolaan agenda, dan sistem voting yang transparan.
            </p>
        </div>

        <!-- Statistics -->
        <div class="bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-xl p-8 border border-indigo-100">
            <h3 class="text-3xl font-bold text-gray-900 mb-6 border-b border-gray-200 pb-4">Statistik Singkat</h3>
            <div class="space-y-5">
                <div class="flex justify-between items-center bg-gradient-to-r from-blue-50 to-white p-5 rounded-xl border border-blue-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="bg-blue-100 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-blue-800">Jumlah Anggota</span>
                    </div>
                    <span class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-xl font-bold px-4 py-2 rounded-lg shadow">{{ $stats['users'] }}</span>
                </div>
                
                <div class="flex justify-between items-center bg-gradient-to-r from-indigo-50 to-white p-5 rounded-xl border border-indigo-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="bg-indigo-100 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-indigo-800">Agenda Aktif</span>
                    </div>
                    <span class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white text-xl font-bold px-4 py-2 rounded-lg shadow">{{ $stats['active_agendas'] }}</span>
                </div>
                
                <div class="flex justify-between items-center bg-gradient-to-r from-green-50 to-white p-5 rounded-xl border border-green-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="bg-green-100 rounded-lg p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium text-green-800">Voting Selesai</span>
                    </div>
                    <span class="bg-gradient-to-r from-green-500 to-green-700 text-white text-xl font-bold px-4 py-2 rounded-lg shadow">{{ $stats['completed_votes'] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-gradient-to-r from-indigo-900 to-indigo-800 py-12 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex justify-center mb-6">
            <div class="bg-indigo-700 rounded-full p-3 shadow-lg inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
        <p class="text-indigo-200 text-lg mb-4">
            &copy; {{ date('Y') }} Musyawarah Digital. All rights reserved.
        </p>
        <div class="flex justify-center space-x-6">
            <a href="#" class="text-indigo-300 hover:text-white transition duration-300">Kebijakan Privasi</a>
            <span class="text-indigo-500">•</span>
            <a href="#" class="text-indigo-300 hover:text-white transition duration-300">Syarat & Ketentuan</a>
            <span class="text-indigo-500">•</span>
            <a href="mailto:Kelompok4@gmail.com" class="text-indigo-300 hover:text-white transition duration-300">Kontak Kami</a>
        </div>
        <p class="mt-6 text-indigo-400 text-sm">
            Dibuat dengan ❤️ oleh Kelompok 4 untuk memajukan partisipasi digital.
        </p>
    </div>
</footer>
@endsection