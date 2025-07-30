<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Musyawarah Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <section class="text-center py-20">
        <h1 class="text-4xl font-bold">Selamat Datang di Musyawarah Digital</h1>
        <p class="mt-4">Platform kolaboratif untuk musyawarah modern berbasis web</p>
        @auth
            <a href="{{ route('dashboard') }}" class="mt-6 inline-block bg-blue-500 text-white px-6 py-2 rounded">Masuk ke Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="mt-6 inline-block bg-green-500 text-white px-6 py-2 rounded">Login</a>
        @endauth
    </section>
</body>
</html>
