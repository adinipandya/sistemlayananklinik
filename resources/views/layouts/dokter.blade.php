<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Polibatam - Dokter</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 999px;
        }
    </style>
</head>

<body class="min-h-dvh bg-slate-100 overflow-x-hidden">

    <!-- HEADER -->
    <header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-slate-200 z-50">

        <div class="h-full px-4 md:px-6 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-3 md:gap-4">

                <button
                    type="button"
                    onclick="openSidebar()"
                    class="lg:hidden w-10 h-10 rounded-xl border border-slate-200 flex items-center justify-center text-slate-700">
                    <i data-feather="menu" class="w-5 h-5"></i>
                </button>

                <img src="{{ asset('images/poltek.png') }}" class="w-8 h-8 object-contain">

                <div>

                    <h1 class="font-bold text-blue-600">
                        Klinik Polibatam
                    </h1>

                    <p class="text-xs text-slate-500">
                        Sistem Layanan Klinik
                    </p>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-5">

                <!-- NOTIFICATION -->
                <div class="relative">

                    <button id="notifButton" onclick="toggleNotifMenu()"
                        class="relative text-slate-600 hover:text-blue-600">

                        <i data-feather="bell"></i>

                        @if(isset($unreadNotifications) && $unreadNotifications > 0)

                        <span class="absolute -top-2 -right-2
                            bg-red-500 text-white
                            text-[10px] font-bold
                            rounded-full
                            min-w-[18px]
                            h-[18px]
                            flex items-center justify-center">

                            {{ $unreadNotifications }}

                        </span>

                        @endif

                    </button>

                    <div
                        id="notifMenu"
                        class="hidden absolute right-0 mt-3 w-[calc(100vw-2rem)] sm:w-80 bg-white rounded-xl shadow-xl border z-50">

                        <div class="p-4 border-b">

                            <h3 class="font-semibold">
                                Notifikasi
                            </h3>

                        </div>

                        @forelse($notifications as $notif)

                        <div class="p-4 border-b">

                            <p class="font-medium text-sm">
                                {{ $notif->judul }}
                            </p>

                            <p class="text-slate-500 text-sm mt-1">
                                {{ $notif->pesan }}
                            </p>

                            <p class="text-xs text-slate-400 mt-2">
                                {{ $notif->created_at->diffForHumans() }}
                            </p>

                        </div>

                        @empty

                        <div class="p-4 text-center text-slate-500">

                            Tidak ada notifikasi

                        </div>

                        @endforelse

                    </div>

                </div>

                <!-- PROFILE -->
                <div class="relative">

                    <button id="profileButton" onclick="toggleProfileMenu()" class="flex items-center gap-3">

                        <div class="hidden sm:block text-right">

                            <p class="font-medium text-slate-700">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Dokter
                            </p>

                        </div>

                        @if(Auth::user()?->photo)

                        <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                            class="w-10 h-10 rounded-full object-cover">

                        @else

                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">

                            <i data-feather="user" class="text-blue-600"></i>

                        </div>

                        @endif

                        <i data-feather="chevron-down" class="w-4 h-4 text-slate-500">
                        </i>

                    </button>

                    <!-- DROPDOWN -->
                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-3 w-60 bg-white rounded-xl shadow-lg border overflow-hidden">

                        <div class="p-4 border-b">

                            <h4 class="font-semibold">
                                {{ Auth::user()->name }}
                            </h4>

                            <p class="text-sm text-slate-500">
                                Dokter Klinik Polibatam
                            </p>

                        </div>

                        <a href="/dokter/profile" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                            <i data-feather="settings" class="w-4 h-4"></i>

                            Pengaturan

                        </a>

                        <a href="/dokter/password" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                            <i data-feather="lock" class="w-4 h-4"></i>

                            Ubah Password

                        </a>

                        <hr>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50">

                                <i data-feather="log-out" class="w-4 h-4"></i>

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            </div>

    </header>

    <!-- OVERLAY MOBILE -->
    <div
        id="sidebarOverlay"
        onclick="closeSidebar()"
        class="hidden fixed inset-0 bg-black/40 z-40 lg:hidden">
    </div>

    <!-- SIDEBAR -->
    <aside
        id="sidebar"
        class="fixed top-16 left-0 bottom-0 w-64 bg-white border-r border-slate-200 z-50
           transform -translate-x-full lg:translate-x-0
           transition-transform duration-300 overflow-y-auto">

        <div class="h-full flex flex-col p-5">

            <div class="mb-8">

                <h2 class="text-lg font-bold text-blue-600">
                    Portal Dokter
                </h2>

                <p class="text-sm text-slate-500">
                    Klinik Polibatam
                </p>

            </div>

            <nav class="space-y-2">

                <a href="/dokter" class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('dokter')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="home"></i>
                    Dashboard

                </a>

                <a href="/dokter/data_pasien" class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('dokter/data_pasien')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="users"></i>
                    Data Pasien

                </a>

                <a href="/dokter/jadwal" class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('dokter/jadwal')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="calendar"></i>
                    Jadwal Praktik

                </a>

                <a href="/dokter/kelola" class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('dokter/kelola')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="file-text"></i>
                    Rekam Medis

                </a>

                <a href="/dokter/resep" class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('dokter/resep')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="clipboard"></i>
                    Resep Obat

                </a>

            </nav>

        </div>

    </aside>

    <!-- CONTENT -->
    <div class="pt-16 min-h-dvh lg:ml-64">

        <main class="min-h-dvh p-4 sm:p-5 md:p-6 lg:p-8">

            @yield('content')

        </main>

    </div>

    <script>
        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    closeSidebar();
                }
            });
        });

        function toggleNotifMenu() {
            document.getElementById('notifMenu').classList.toggle('hidden');
        }

        function toggleProfileMenu() {
            document.getElementById('profileMenu').classList.toggle('hidden');
        }

        function toggleNotifMenu() {
            document
                .getElementById('notifMenu')
                .classList
                .toggle('hidden');
        }


        function toggleProfileMenu() {

            document
                .getElementById('profileMenu')
                .classList.toggle('hidden');

        }

        document.addEventListener('click', function(event) {

            const profileMenu =
                document.getElementById('profileMenu');

            const profileButton =
                document.getElementById('profileButton');

            if (
                profileMenu &&
                !profileMenu.contains(event.target) &&
                !profileButton.contains(event.target)
            ) {
                profileMenu.classList.add('hidden');
            }

            const notifMenu =
                document.getElementById('notifMenu');

            const notifButton =
                document.getElementById('notifButton');

            if (
                notifMenu &&
                !notifMenu.contains(event.target) &&
                !notifButton.contains(event.target)
            ) {
                notifMenu.classList.add('hidden');
            }

        });

        feather.replace();
    </script>

</body>

</html>