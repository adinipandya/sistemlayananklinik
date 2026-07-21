<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Polibatam - Pasien</title>

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
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="min-h-dvh bg-slate-100 overflow-x-hidden">

@php
$notifications = \App\Models\Notification::where(
    'user_id',
    Auth::id()
)->latest()->get();

$unreadCount = \App\Models\Notification::where(
    'user_id',
    Auth::id()
)->where('is_read', false)->count();
@endphp

    <!-- HEADER -->
    <header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-slate-200 z-50">

        <div class="h-full px-6 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center gap-4">

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

                <!-- NOTIFIKASI -->
                <div class="relative">

                    <button id="notifButton"
                        onclick="toggleNotifMenu()"
                        class="relative text-slate-600 hover:text-blue-600">

                        <i data-feather="bell"></i>

                        @if($unreadCount > 0)
<span id="notifBadge"
    class="absolute -top-2 -right-2
    bg-red-500 text-white
    text-[10px] font-bold
    rounded-full
    min-w-[18px]
    h-[18px]
    flex items-center justify-center">

    {{ $unreadCount }}

</span>
@endif

                    </button>

                    <div id="notifMenu"
class="hidden absolute right-0 mt-3 w-80 bg-white rounded-xl shadow-xl border z-50">

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

                    <button id="profileButton"
                        onclick="toggleProfileMenu()"
                        class="flex items-center gap-3">

                        <div class="text-right">

                            <p class="font-medium text-slate-700">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Pasien
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

                        <i data-feather="chevron-down"
                            class="w-4 h-4 text-slate-500"></i>

                    </button>

                    <div id="profileMenu"
                        class="hidden absolute right-0 mt-3 w-60 bg-white rounded-xl shadow-lg border overflow-hidden">

                        <div class="p-4 border-b">

                            <h4 class="font-semibold">
                                {{ Auth::user()->name }}
                            </h4>

                            <p class="text-sm text-slate-500">
                                Pasien Klinik Polibatam
                            </p>

                        </div>

                        <a href="/pasien/profile"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                            <i data-feather="settings" class="w-4 h-4"></i>

                            Pengaturan

                        </a>

                        <a href="/pasien/pengaturan"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                            <i data-feather="lock" class="w-4 h-4"></i>

                            Ubah Password

                        </a>

                        <hr>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button
                                class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50">

                                <i data-feather="log-out" class="w-4 h-4"></i>

                                Logout

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <!-- SIDEBAR -->
    <aside class="fixed top-16 left-0 bottom-0 w-64 bg-white border-r border-slate-200 z-40">

        <div class="h-full flex flex-col p-5">

            <div class="mb-8">

                <h2 class="text-lg font-bold text-blue-600">
                    Portal Pasien
                </h2>

                <p class="text-sm text-slate-500">
                    Klinik Polibatam
                </p>

            </div>

            <nav class="space-y-2">

                <a href="/pasien"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('pasien')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="home"></i>
                    Dashboard

                </a>

                <a href="/pasien/booking"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('pasien/booking')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="clipboard"></i>
                    Booking Konsultasi

                </a>

                <a href="/pasien/jadwal"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('pasien/jadwal')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="calendar"></i>
                    Jadwal Konsultasi

                </a>

                <a href="/pasien/rekam-medis"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('pasien/rekam-medis')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="file-text"></i>
                    Riwayat Konsultasi

                </a>

                <a href="/pasien/feedback"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl
                    {{ request()->is('pasien/feedback')
                    ? 'bg-blue-50 text-blue-600 border-l-4 border-blue-600 font-semibold'
                    : 'text-slate-700 hover:bg-slate-100' }}">

                    <i data-feather="message-square"></i>
                    Feedback

                </a>

            </nav>

        </div>

    </aside>

    <!-- CONTENT -->
    <div class="pt-16 ml-64 min-h-screen">

        <main class="p-8">

            @yield('content')

        </main>

    </div>

    <script>

        function toggleNotifMenu() {
            document.getElementById('notifMenu').classList.toggle('hidden');
        }

        function toggleProfileMenu() {
            document.getElementById('profileMenu').classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {

            const profileMenu = document.getElementById('profileMenu');
            const profileButton = document.getElementById('profileButton');

            if (
                profileMenu &&
                !profileMenu.contains(event.target) &&
                !profileButton.contains(event.target)
            ) {
                profileMenu.classList.add('hidden');
            }

            const notifMenu = document.getElementById('notifMenu');
            const notifButton = document.getElementById('notifButton');

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
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 800,
    once: true
});
</script>
</body>

</html>