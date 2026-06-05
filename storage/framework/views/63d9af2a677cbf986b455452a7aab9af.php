<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

```
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/feather-icons"></script>
```

</head>

<body class="bg-slate-100">

```
<!-- HEADER -->
<header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-slate-200 z-50">

    <div class="h-full px-6 flex items-center justify-between">

        <!-- KIRI -->
        <div class="flex items-center gap-4">

            <button onclick="toggleSidebar()" class="md:hidden text-slate-600">
                ☰
            </button>

            <img src="<?php echo e(asset('images/poltek.png')); ?>" class="w-8 h-8 object-contain">

            <div>

                <h1 class="font-bold text-blue-600">
                    Klinik Polibatam
                </h1>

                <p class="text-xs text-slate-500">
                    Sistem Layanan Klinik
                </p>

            </div>

        </div>

        <!-- KANAN -->
        <div class="flex items-center gap-5">

            <!-- NOTIFIKASI -->
            <div class="relative">

                <button id="notifButton"
                    onclick="toggleNotifMenu()"
                    class="relative text-slate-600 hover:text-blue-600">

                    <i data-feather="bell"></i>

                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] px-1 rounded-full">
                        3
                    </span>

                </button>

                <div id="notifMenu"
                    class="hidden absolute right-0 mt-3 w-72 bg-white rounded-xl shadow-lg border overflow-hidden">

                    <div class="px-4 py-3 border-b font-semibold">
                        Notifikasi
                    </div>

                    <div class="p-4 text-sm border-b hover:bg-slate-50">
                        Ada pendaftaran pasien baru.
                    </div>

                    <div class="p-4 text-sm hover:bg-slate-50">
                        Jadwal dokter berhasil diperbarui.
                    </div>

                </div>

            </div>

            <!-- PROFILE -->
            <div class="relative">

                <button id="profileButton"
                    onclick="toggleProfileMenu()"
                    class="flex items-center gap-3">

                    <div class="text-right">

                        <p class="font-medium text-slate-700">
                            <?php echo e(Auth::user()->name); ?>

                        </p>

                        <p class="text-xs text-slate-500">
                            Admin
                        </p>

                    </div>

                    <div class="w-10 h-10 rounded-full overflow-hidden bg-blue-100 flex items-center justify-center">

                        <?php if(Auth::user()->photo): ?>

                            <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>"
                                class="w-full h-full object-cover">

                        <?php else: ?>

                            <i data-feather="user" class="text-blue-600"></i>

                        <?php endif; ?>

                    </div>

                    <i data-feather="chevron-down" class="w-4 h-4 text-slate-500"></i>

                </button>

                <div id="profileMenu"
                    class="hidden absolute right-0 mt-3 w-60 bg-white rounded-xl shadow-lg border overflow-hidden">

                    <div class="p-4 border-b">

                        <h4 class="font-semibold">
                            <?php echo e(Auth::user()->name); ?>

                        </h4>

                        <p class="text-sm text-slate-500">
                            Admin Klinik Polibatam
                        </p>

                    </div>

                    <a href="/admin/profile"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                        <i data-feather="user" class="w-4 h-4"></i>
                        <span>Profil Saya</span>

                    </a>

                    <a href="/admin/password"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-slate-50">

                        <i data-feather="lock" class="w-4 h-4"></i>
                        <span>Ubah Password</span>

                    </a>

                    <hr>

                    <form action="<?php echo e(route('logout')); ?>" method="POST">

                        <?php echo csrf_field(); ?>

                        <button
                            class="w-full flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50">

                            <i data-feather="log-out" class="w-4 h-4"></i>
                            <span>Logout</span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</header>

<!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed top-16 left-0 bottom-0 w-64 bg-white border-r border-slate-200 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-40">

    <div class="h-full flex flex-col p-5">

        <div class="mb-8">

            <h2 class="text-lg font-bold text-blue-600">
                Portal Admin
            </h2>

            <p class="text-sm text-slate-500">
                Klinik Polibatam
            </p>

        </div>

        <nav class="space-y-2">

            <a href="/admin" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="home"></i>
                Dashboard
            </a>

            <a href="/admin/dokter" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="user-check"></i>
                Data Dokter
            </a>

            <a href="/admin/pasien" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="users"></i>
                Data Pasien
            </a>

            <a href="/admin/jadwal" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="calendar"></i>
                Jadwal Dokter
            </a>

            <a href="/admin/obat" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="package"></i>
                Data Obat
            </a>

            <a href="/admin/resep" class="flex items-center gap-3 px-4 py-3 rounded-lg">
                <i data-feather="file-text"></i>
                Resep Obat
            </a>

        </nav>

    </div>

</aside>

<!-- OVERLAY -->
<div id="overlay"
    class="hidden fixed inset-0 bg-black/40 z-30"
    onclick="toggleSidebar()"></div>

<!-- CONTENT -->
<div class="pt-16 md:ml-64 min-h-screen">

    <main class="p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</div>

<script>

    function toggleSidebar() {

        document
            .getElementById('sidebar')
            .classList.toggle('-translate-x-full');

        document
            .getElementById('overlay')
            .classList.toggle('hidden');
    }

    function toggleProfileMenu() {

        document
            .getElementById('profileMenu')
            .classList.toggle('hidden');
    }

    function toggleNotifMenu() {

        document
            .getElementById('notifMenu')
            .classList.toggle('hidden');
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
```

</body>
</html>
<?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/layouts/admin.blade.php ENDPATH**/ ?>