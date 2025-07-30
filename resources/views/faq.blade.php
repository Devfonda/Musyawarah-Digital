@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-center mb-10 text-white tracking-tight">
        Pertanyaan yang Sering Diajukan (FAQ)
    </h1>

    <div class="space-y-6">
        <!-- FAQ Item 1 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Apa itu aplikasi Musyawarah Digital?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Aplikasi Musyawarah Digital adalah platform yang dirancang untuk memfasilitasi musyawarah secara daring. 
                    Aplikasi ini menyediakan fitur agenda, voting, dan chat untuk mendukung proses pengambilan keputusan 
                    secara kolaboratif dalam organisasi atau komunitas.
                </p>
            </div>
        </div>

        <!-- FAQ Item 2 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara membuat agenda baru?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Untuk membuat agenda baru:
                    <ol class="list-decimal pl-5 mt-2 space-y-1 text-gray-700">
                        <li>Masuk ke menu Agenda</li>
                        <li>Isi form yang disediakan (judul, deskripsi, tanggal, waktu, tempat)</li>
                        <li>Pilih status "Aktif"</li>
                        <li>Klik tombol "Simpan Agenda"</li>
                    </ol>
                </p>
            </div>
        </div>

        <!-- FAQ Item 3 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara memulai voting?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    <ol class="list-decimal pl-5 mt-2 space-y-1 text-gray-700">
                        <li>Pergi ke halaman Voting</li>
                        <li>Klik tombol "Buat Voting Baru"</li>
                        <li>Isi judul dan deskripsi keputusan yang akan divoting</li>
                        <li>Klik tombol "Mulai Voting"</li>
                        <li>Setelah voting dibuat, peserta dapat memilih setuju atau tidak setuju</li>
                    </ol>
                </p>
            </div>
        </div>

        <!-- FAQ Item 4 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Apakah saya bisa mengubah pilihan voting?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Tidak, setiap peserta hanya dapat memilih sekali untuk setiap voting. 
                    Pastikan Anda yakin dengan pilihan Anda sebelum mengirimkan suara.
                </p>
            </div>
        </div>

        <!-- FAQ Item 5 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Bagaimana cara melihat hasil voting?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Hasil voting dapat dilihat langsung di halaman Voting. Setiap voting akan menampilkan:
                    <ul class="list-disc pl-5 mt-2 space-y-1 text-gray-700">
                        <li>Persentase suara setuju dan tidak setuju</li>
                        <li>Jumlah suara masing-masing pilihan</li>
                        <li>Progress bar visual untuk perbandingan hasil</li>
                    </ul>
                    Hasil voting terbaru juga ditampilkan di halaman Dashboard.
                </p>
            </div>
        </div>

        <!-- FAQ Item 6 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Apakah aplikasi ini gratis?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Ya, aplikasi Musyawarah Digital sepenuhnya gratis digunakan. 
                    Kami berkomitmen untuk menyediakan platform musyawarah digital yang 
                    dapat diakses oleh semua komunitas tanpa biaya.
                </p>
            </div>
        </div>

        <!-- FAQ Item 7 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition duration-300 hover:scale-[1.01]">
            <button class="w-full text-left p-6 bg-gradient-to-r from-blue-50 to-blue-100 flex justify-between items-center focus:outline-none" onclick="toggleFAQ(this)">
                <h2 class="text-xl font-semibold text-gray-800">Siapa yang mengembangkan aplikasi ini?</h2>
                <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div class="p-6 border-t border-gray-200 hidden">
                <p class="text-gray-700 leading-relaxed">
                    Aplikasi ini dikembangkan oleh tim DevFonda. Untuk informasi lebih lanjut, 
                    Anda dapat mengunjungi halaman <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline font-medium">Tentang Developer</a> 
                    di Dashboard.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleFAQ(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');

        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            content.style.maxHeight = content.scrollHeight + 'px'; // Set max-height for smooth transition
            icon.classList.add('rotate-180');
        } else {
            content.style.maxHeight = '0'; // Collapse content
            content.addEventListener('transitionend', function() {
                content.classList.add('hidden');
                content.style.maxHeight = ''; // Reset max-height after transition
            }, { once: true });
            icon.classList.remove('rotate-180');
        }
    }
</script>
@endsection
