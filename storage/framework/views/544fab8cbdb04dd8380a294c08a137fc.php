<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dokter</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 15px 25px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body class="bg-gray-50">

<!-- ================= NAVBAR ================= -->
<header class="fixed top-0 left-0 w-full bg-white shadow border-b z-50">
    <div class="flex items-center justify-between px-6 py-3">

        <!-- LEFT -->
        <div class="flex items-center gap-3">

            <!-- HAMBURGER (MOBILE ONLY) -->
            <button onclick="toggleSidebar()" class="md:hidden text-2xl mr-2">
                ☰
            </button>

            <!-- LOGO (TETAP) -->
            <img src="<?php echo e(asset('images/poltek.png')); ?>" class="w-8 h-8 object-contain">
            <span class="font-semibold text-gray-700">
                Klinik Polibatam
            </span>
        </div>

        <!-- ICON -->
        <div class="flex items-center gap-6">

            <div class="relative cursor-pointer hover:scale-110 transition">
                <i data-feather="bell"></i>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded-full">2</span>
            </div>

            <div class="cursor-pointer hover:scale-110 transition">
                <i data-feather="user"></i>
            </div>

            <form action="<?php echo e(route('logout')); ?>" method="POST"
                  onsubmit="return confirm('Anda yakin ingin keluar?')">
                <?php echo csrf_field(); ?>
                <button class="text-red-500 hover:text-red-700">
                    <i data-feather="log-out"></i>
                </button>
            </form>

        </div>
    </div>
</header>

<!-- ================= SIDEBAR ================= -->
<aside id="sidebar" onclick="event.stopPropagation()"
class="fixed top-0 bottom-0 left-0 w-64 bg-gradient-to-b from-blue-500 to-green-400 text-white p-6 pt-20
overflow-y-auto
transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">

    <h2 class="text-xl font-bold mb-8">Dokter</h2>

    <ul class="space-y-4">

        <li>
            <a href="/dokter"
               class="block px-4 py-2 rounded-lg
               <?php echo e(request()->is('dokter') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10'); ?>">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/dokter/jadwal"
               class="block px-4 py-2 rounded-lg
               <?php echo e(request()->is('dokter/jadwal') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10'); ?>">
                Jadwal
            </a>
        </li>

        <li>
            <a href="/dokter/konsultasi"
               class="block px-4 py-2 rounded-lg
               <?php echo e(request()->is('dokter/konsultasi') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10'); ?>">
                Konsultasi
            </a>
        </li>

        <li>
            <a href="/dokter/kelola"
               class="block px-4 py-2 rounded-lg
               <?php echo e(request()->is('dokter/kelola') ? 'bg-white/20 font-semibold' : 'hover:bg-white/10'); ?>">
                Rekam Medis
            </a>
        </li>

    </ul>
</aside>

<!-- OVERLAY -->
<div id="overlay"
class="hidden fixed inset-0 bg-black/40 z-30"
onclick="toggleSidebar()"></div>

<!-- ================= CONTENT ================= -->
<div class="flex min-h-screen pt-16">

    <!-- MAIN -->
    <main class="flex-1 p-6 md:ml-64">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

<!-- SCRIPT -->
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
}

AOS.init({
    duration: 700,
    once: true,
    easing: 'ease-in-out'
});
feather.replace();
</script>

</body>
</html><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/layouts/dokter.blade.php ENDPATH**/ ?>