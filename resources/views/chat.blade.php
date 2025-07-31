@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col h-[600px]">
        <!-- Header -->
        <div class="bg-red-600 px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold text-white">💬 Chat Room Musyawarah</h2>
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-green-400 mr-2"></div>
                <span class="text-indigo-100" id="online-count">0</span>
            </div>
        </div>
        
        <!-- Pesan -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50">
            @foreach($messages as $message)
            <div class="flex flex-col {{ $message->user_id == auth()->id() ? 'items-end' : '' }}">
                <div class="flex items-center mb-1">
                    @if($message->user_id != auth()->id())
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($message->user->name) }}&background=random" 
                         alt="{{ $message->user->name }}" 
                         class="w-6 h-6 rounded-full mr-2">
                    @endif
                    <span class="text-xs font-medium {{ $message->user_id == auth()->id() ? 'text-indigo-600' : 'text-gray-600' }}">
                        {{ $message->user_id == auth()->id() ? 'Anda' : $message->user->name }}
                    </span>
                    <span class="text-xs text-gray-500 ml-2">
                        {{ $message->created_at->format('H:i') }}
                    </span>
                </div>
                <div class="px-4 py-3 rounded-2xl max-w-[80%] 
                    {{ $message->user_id == auth()->id() ? 
                       'bg-red-500 text-white rounded-br-none' : 
                       'bg-white border border-gray-200 rounded-bl-none' }}">
                    {{ $message->message }}
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Input Pesan -->
        <form id="chat-form" class="flex border-t p-4 bg-gray-100">
            @csrf
            <input type="text" id="message" name="message" autocomplete="off" 
                   placeholder="Ketik pesan..." 
                   class="flex-1 border border-gray-300 rounded-l-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-300" />
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-r-xl flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                Kirim
            </button>
        </form>
    </div>
</div>

<!-- Sertakan Pusher dan Echo -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Inisialisasi Pusher
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        authEndpoint: '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}'
            }
        }
    });

    // Gabung channel chat
    const channel = pusher.subscribe('presence-chat-room');
    
    // Hitung pengguna online
    channel.bind('pusher:subscription_succeeded', members => {
        document.getElementById('online-count').textContent = members.count;
    });
    
    channel.bind('pusher:member_added', member => {
        document.getElementById('online-count').textContent = channel.members.count;
    });
    
    channel.bind('pusher:member_removed', member => {
        document.getElementById('online-count').textContent = channel.members.count;
    });

    // Fungsi untuk menambahkan pesan ke UI
    function addMessageToUI(data, isLocal = false) {
        const now = new Date();
        const time = isLocal 
            ? now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0')
            : new Date(data.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        
        const isMe = isLocal || data.user.id == {{ auth()->id() }};
        const alignClass = isMe ? 'items-end' : '';
        const bgClass = isMe 
            ? 'bg-red-500 text-white rounded-br-none' 
            : 'bg-white border border-gray-200 rounded-bl-none';
        const name = isMe ? 'Anda' : data.user.name;
        
        const messageHTML = `
            <div class="flex flex-col ${alignClass}">
                <div class="flex items-center mb-1">
                    ${!isMe ? `
                    <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=random" 
                         alt="${name}" 
                         class="w-6 h-6 rounded-full mr-2">
                    ` : ''}
                    <span class="text-xs font-medium ${isMe ? 'text-indigo-600' : 'text-gray-600'}">
                        ${name}
                    </span>
                    <span class="text-xs text-gray-500 ml-2">
                        ${time}
                    </span>
                </div>
                <div class="px-4 py-3 rounded-2xl max-w-[80%] ${bgClass}">
                    ${data.message}
                </div>
            </div>
        `;
        
        document.getElementById('chat-messages').innerHTML += messageHTML;
        
        // Scroll ke bawah
        const chat = document.getElementById('chat-messages');
        chat.scrollTop = chat.scrollHeight;
    }

    // Kirim pesan via AJAX dan tampilkan langsung
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const messageInput = document.getElementById('message');
        const message = messageInput.value.trim();
        
        if(message === '') return;
        
        // Tampilkan pesan langsung di UI
        addMessageToUI({
            message: message,
            user: { id: {{ auth()->id() }} },
            created_at: new Date().toISOString()
        }, true);
        
        // Kirim ke server
        fetch('{{ route("chat.send") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal mengirim pesan');
            }
            messageInput.value = '';
            messageInput.focus();
        })
        .catch(error => {
            console.error('Error:', error);
            // Tampilkan notifikasi error
            alert('Gagal mengirim pesan: ' + error.message);
        });
    });

    // Tangkap pesan baru dari Pusher
    channel.bind('App\\Events\\NewChatMessage', data => {
        // Hanya tampilkan jika bukan pesan dari diri sendiri
        if(data.user.id !== {{ auth()->id() }}) {
            addMessageToUI(data);
        }
    });

    // Scroll ke bawah saat halaman dimuat
    window.addEventListener('DOMContentLoaded', () => {
        const chat = document.getElementById('chat-messages');
        chat.scrollTop = chat.scrollHeight;
    });
</script>
@endsection