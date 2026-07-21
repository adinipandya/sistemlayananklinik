<?php $__env->startSection('content'); ?>

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Dokter
    </h1>
    <p class="text-slate-500 mt-2">
        Selamat datang, Dr. <?php echo e(Auth::user()->name); ?>

    </p>
</div>

<!-- STATISTIK -->
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-3xl p-6 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-slate-500 text-sm">Jadwal Hari Ini</p>
                <h2 class="text-4xl font-bold mt-2 text-slate-800"><?php echo e($jadwalHariIni); ?></h2>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">
                <i data-feather="calendar" class="text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-slate-500 text-sm">Konsultasi Aktif</p>
                <h2 class="text-4xl font-bold mt-2 text-slate-800"><?php echo e($konsultasiAktif); ?></h2>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center">
                <i data-feather="activity" class="text-orange-500"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-slate-500 text-sm">Rekam Medis</p>
                <h2 class="text-4xl font-bold mt-2 text-slate-800"><?php echo e($totalRekamMedis); ?></h2>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">
                <i data-feather="file-text" class="text-purple-600"></i>
            </div>
        </div>
    </div>

</div>

<!-- KONTEN -->
<div class="grid lg:grid-cols-3 gap-6">

    <!-- JADWAL -->
    <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm">
        <div class="p-6 border-b">

            <h2 class="text-xl font-bold text-slate-800">
                Jadwal Konsultasi Hari Ini
            </h2>

        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-slate-500 text-sm">

                        <th class="text-left p-5">
                            Jam
                        </th>

                        <th class="text-left p-5">
                            Pasien
                        </th>

                        <th class="text-left p-5">
                            Keluhan
                        </th>

                        <th class="text-center p-5">
                            Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $jadwalHariIniList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t">
                        <td class="p-5"><?php echo e(\Carbon\Carbon::parse($jadwal->jam)->format('H:i')); ?></td>
                        <td class="p-5"><?php echo e($jadwal->pasien->name); ?></td>
                        <td class="p-5"><?php echo e($jadwal->keluhan); ?></td>

                        <td class="text-center p-5">

                            <span class="px-3 py-1 rounded-full text-sm
                                <?php if($jadwal->status == 'Selesai'): ?> bg-green-100 text-green-700
                                <?php elseif($jadwal->status == 'Menunggu'): ?> bg-yellow-100 text-yellow-700
                                <?php else: ?> bg-red-100 text-red-700
                                <?php endif; ?>">
                                <?php echo e($jadwal->status); ?>

                            </span>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="p-6 text-center text-slate-500">
                            Tidak ada jadwal hari ini
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- PROFIL -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <div class="text-center">

            <?php if(Auth::user()?->photo): ?>
                <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>"
                    class="w-28 h-28 rounded-full mx-auto object-cover">
            <?php else: ?>
                <div class="w-28 h-28 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
                    <i data-feather="user" class="w-10 h-10 text-blue-600"></i>
                </div>
            <?php endif; ?>

            <h3 class="font-bold text-xl mt-4">

                <?php echo e(Auth::user()->name); ?>


            </h3>

            <p class="text-slate-500">
                Dokter <?php echo e($dokter->spesialis ?? '-'); ?>

            </p>

        </div>

        <div class="mt-8 space-y-4">
            <div class="flex justify-between">

                <span class="text-slate-500">
                    SIP
                </span>

                <span>
                    <?php echo e($dokter->sip ?? '-'); ?>

                </span>

            </div>
            <div class="flex justify-between">

                <span class="text-slate-500">
                    Poliklinik
                </span>

                <span class="font-semibold">
                    <?php echo e($dokter->spesialis ?? 'Umum'); ?>

                </span>

            </div>
            <div class="flex justify-between">

                <span class="text-slate-500">
                    Jam Praktik
                </span>

                <span class="font-semibold">
                    <?php echo e($dokter->jam_praktek ?? '08:00 - 16:00'); ?>

                </span>

            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/dashboard_dokter.blade.php ENDPATH**/ ?>