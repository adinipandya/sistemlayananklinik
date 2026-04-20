<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter Dashboard</title>

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
        animation: fadeInUp 0.6s ease forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    .delay-5 { animation-delay: 0.5s; }
    </style>
</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- SIDEBAR -->
    <div class="w-64 min-h-screen bg-gradient-to-b from-blue-600 to-green-400 text-white p-6">

        <h2 class="text-2xl font-bold mb-8">Dokter</h2>

        <ul class="space-y-3">

            <li>
                <a href="/dokter" 
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/dokter/jadwal" 
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Jadwal
                </a>
            </li>

            <li>
                <a href="/dokter/konsultasi" 
                   class="block px-4 py-2 rounded hover:bg-white/20 hover:pl-6 transition-all duration-300">
                    Konsultasi
                </a>
            </li>

            <!-- LOGOUT -->
            <li class="pt-4">
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