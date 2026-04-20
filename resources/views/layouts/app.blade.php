<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
</head>

<body class="bg-gray-50">

<!-- NAVBAR -->
<nav class="bg-white shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <div class="flex items-center gap-2">
            <img src="/images/poltek.png" class="w-8 h-8">
            <h1 class="font-bold text-lg">Klinik Polibatam</h1>
        </div>

        <!-- MENU -->
        <div class="space-x-6 hidden md:flex">
            <a href="/" class="hover:text-blue-500">Beranda</a>
            <a href="/layanan" class="hover:text-blue-500">Layanan</a>
            <a href="/about" class="hover:text-blue-500">Tentang</a>
            <a href="/login"
               class="bg-gradient-to-r from-blue-500 to-green-400 text-white px-4 py-2 rounded-lg">
               Masuk
            </a>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="pt-24">
    @yield('content')
</div>

<!-- FOOTER -->
<footer class="bg-gray-800 text-white text-center py-6 mt-10">
    ©️ 2026 Klinik Polibatam
</footer>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

</body>
</html>