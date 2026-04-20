<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 min-h-screen bg-gradient-to-b from-blue-600 to-green-400 text-white p-6">

        <h2 class="text-2xl font-bold mb-6">Dokter</h2>

        <ul class="space-y-3">
            <li>
                <a href="/dokter" class="block px-4 py-2 hover:bg-white/20 rounded">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/dokter/jadwal" class="block px-4 py-2 hover:bg-white/20 rounded">
                    Jadwal
                </a>
            </li>

            <li>
                <a href="/dokter/konsultasi" class="block px-4 py-2 hover:bg-white/20 rounded">
                    Konsultasi
                </a>
            </li>

            <li>
                <a href="/dokter/pasien" class="block px-4 py-2 hover:bg-white/20 rounded">
                    Pasien
                </a>
            </li>

            <!-- LOGOUT -->
            <li>
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin logout?')">
                    @csrf
                    <button class="w-full text-left px-4 py-2 hover:bg-red-500 rounded transition">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-8">
        @yield('content')
    </div>

</div>

</body>
</html>