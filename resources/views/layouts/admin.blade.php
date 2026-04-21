<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ANIMASI -->
    <style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.5s ease forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    </style>

</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 min-h-screen bg-gradient-to-b from-blue-600 to-green-400 text-white p-6">

        <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>

        <ul class="space-y-3">

            <li>
                <a href="/admin"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/admin/dokter"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Dokter
                </a>
            </li>

            <li>
                <a href="/admin/pasien"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Pasien
                </a>
            </li>

            <li>
                <a href="/admin/jadwal"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Jadwal
                </a>
            </li>

            <li>
                <a href="/admin/obat"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Obat
                </a>
            </li>

            <li>
                <a href="/admin/resep"
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Resep
                </a>
            </li>

            <!-- LOGOUT -->
            <li class="pt-6">
                <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?')">
                    @csrf
                    <button class="w-full text-left px-4 py-2 rounded hover:bg-red-500 transition duration-300">
                        Keluar
                    </button>
                </form>
            </li>

        </ul>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-8 animate-fadeInUp">
        @yield('content')
    </div>

</div>

</body>
</html>