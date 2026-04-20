<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Pasien</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <style>
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
    </style>
</head>

<body class="bg-gray-50">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gradient-to-b from-blue-500 to-green-400 text-white p-6 hidden md:block">

    <h2 class="text-xl font-bold mb-8">Pasien</h2>

    <ul class="space-y-4 text-white">

    <li>
        <a href="/pasien"
        class="block px-4 py-2 rounded-lg transition
        {{ request()->is('pasien') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Dashboard
        </a>
    </li>

    <li>
        <a href="/pasien/booking"
        class="block px-4 py-2 rounded-lg transition
        {{ request()->is('pasien/booking') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Booking
        </a>
    </li>

    <li>
        <a href="/pasien/jadwal"
        class="block px-4 py-2 rounded-lg transition
        {{ request()->is('pasien/jadwal') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Jadwal
        </a>
    </li>

    <li>
        <a href="/pasien/rekam-medis"
        class="block px-4 py-2 rounded-lg transition
        {{ request()->is('pasien/rekam-medis') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            Rekam Medis
        </a>
    </li>

    <li>
        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin logout?')">
    @csrf
    <button class="w-full text-left px-4 py-2 text-white opacity-80 hover:bg-red-500 rounded transition">
        Logout
    </button>
</form>
    </li>

</ul>

</aside>

    <!-- MAIN -->
    <main class="flex-1 p-6">

        @yield('content')

    </main>

</div>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

</body>
</html>