<?php $__env->startSection('content'); ?>

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Admin
    </h1>

    <p class="text-slate-500 mt-1">
        Selamat datang, <?php echo e(Auth::user()->name); ?>

    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Dokter
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?php echo e($totalDokter); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Pasien
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            <?php echo e($totalPasien); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Jadwal Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?php echo e($totalJadwalHariIni); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Feedback Masuk
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            <?php echo e($totalFeedback); ?>

        </h2>

    </div>

</div>

<!-- JADWAL + FEEDBACK -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <!-- JADWAL -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Jadwal Hari Ini
            </h2>

        </div>

        <div class="p-5 space-y-4">

            <?php $__empty_1 = true; $__currentLoopData = $jadwalHariIni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="flex justify-between">

                    <span>
                        <?php echo e($jadwal->dokter->nama ?? 'Dokter'); ?>

                    </span>

                    <span class="text-slate-500">
                        <?php echo e(\Carbon\Carbon::parse($jadwal->jam)->format('H:i')); ?>

                    </span>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="text-slate-500">
                    Belum ada jadwal konsultasi hari ini.
                </p>

            <?php endif; ?>

        </div>

    </div>

    <!-- FEEDBACK -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b flex justify-between items-center">

            <h2 class="font-semibold">
                Feedback Terbaru
            </h2>

            <a href="/admin/feedback" class="text-blue-600 text-sm hover:underline">
                Lihat Semua
            </a>

        </div>

        <div class="p-5 space-y-4">

            <?php $__empty_1 = true; $__currentLoopData = $feedbackTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="border-b pb-3">

                    <div class="flex justify-between">

                        <p class="font-medium">
                            <?php echo e($item->user->name ?? 'Pasien'); ?>

                        </p>

                        <span class="text-yellow-500">
                            <?php echo e(str_repeat('⭐', $item->rating)); ?>

                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-1">
                        <?php echo e(\Illuminate\Support\Str::limit($item->komentar, 50)); ?>

                    </p>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="text-slate-500">
                    Belum ada feedback.
                </p>

            <?php endif; ?>

        </div>

    </div>

</div>

<!-- MENUNGGU RESPON -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-8">

    <p class="text-sm text-slate-500">
        Feedback Menunggu Respon
    </p>

    <h2 class="text-3xl font-bold text-red-500 mt-2">
        <?php echo e($feedbackMenunggu); ?>

    </h2>

</div>

<!-- DOKTER + PASIEN -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <!-- DOKTER -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Dokter Terbaru
            </h2>

        </div>

        <div class="p-5 space-y-3">

            <?php $__empty_1 = true; $__currentLoopData = $dokterTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="flex justify-between">

                    <span><?php echo e($dokter->nama); ?></span>

                    <span class="text-green-600 text-sm">
                        <?php echo e($dokter->status); ?>

                    </span>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="text-slate-500">
                    Belum ada data dokter.
                </p>

            <?php endif; ?>

        </div>

    </div>

    <!-- PASIEN -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Pasien Terbaru
            </h2>

        </div>

        <div class="p-5 space-y-3">

            <?php $__empty_1 = true; $__currentLoopData = $pasienTerbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pasien): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="flex justify-between">

                    <span><?php echo e($pasien->name); ?></span>

                    <span class="text-slate-500 text-sm">
                        <?php echo e($pasien->status); ?>

                    </span>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <p class="text-slate-500">
                    Belum ada data pasien.
                </p>

            <?php endif; ?>

        </div>

    </div>

</div>

<!-- AKTIVITAS -->
<div class="bg-white border border-slate-200 rounded-xl">

    <div class="p-5 border-b">

        <h2 class="font-semibold">
            Aktivitas Sistem
        </h2>

    </div>

    <div class="p-5 space-y-4">

        <div class="border-l-4 border-blue-500 pl-4">
            Pasien baru berhasil registrasi.
        </div>

        <div class="border-l-4 border-green-500 pl-4">
            Jadwal konsultasi berhasil dibuat.
        </div>

        <div class="border-l-4 border-yellow-500 pl-4">
            Feedback baru telah diterima.
        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/dashboard_admin.blade.php ENDPATH**/ ?>