<?php $__env->startSection('content'); ?>

<div class="flex justify-between items-center mb-8">


    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Jadwal Konsultasi
        </h1>

        <p class="text-slate-500 mt-2">
            Kelola antrean pasien dan konsultasi hari ini
        </p>

    </div>


</div>

<!-- STATISTIK -->

<div class="grid lg:grid-cols-4 gap-6 mb-8">


    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Total Jadwal
        </p>

        <h2 class="text-4xl font-bold mt-2 text-slate-800">
            <?php echo e($totalJadwal); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Menunggu
        </p>

        <h2 class="text-4xl font-bold mt-2 text-yellow-500">
            <?php echo e($totalMenunggu); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Sedang Berjalan
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            <?php echo e($totalDisetujui); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Selesai
        </p>

        <h2 class="text-4xl font-bold mt-2 text-emerald-600">
            <?php echo e($totalSelesai); ?>

        </h2>

    </div>


</div>

<div class="grid lg:grid-cols-3 gap-6">


    <!-- TABEL ANTREAN -->
    <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm">

        <div class="p-6 border-b">

            <h2 class="font-bold text-lg">
                Antrean Konsultasi
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50 border-b">

                        <th class="p-4 text-left">
                            Tanggal
                        </th>

                        <th class="p-4 text-left">
                            Jam
                        </th>

                        <th class="p-4 text-left">
                            Pasien
                        </th>

                        <th class="p-4 text-left">
                            Keluhan
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4 text-left">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-slate-50">

                        <td class="p-4">

                            <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>


                        </td>

                        <td class="p-4 font-semibold text-blue-600">

                            <?php echo e(substr($item->jam,0,5)); ?>


                        </td>

                        <td class="p-4 font-medium">

                            <?php echo e($item->pasien->name); ?>


                        </td>

                        <td class="p-4">

                            <?php echo e($item->keluhan); ?>


                        </td>

                        <td class="p-4">

                            <?php
                            $terlambat =
                            $item->status == 'Menunggu' &&
                            \Carbon\Carbon::parse($item->tanggal . ' ' . $item->jam)->isPast();
                            ?>

                            <?php if($terlambat): ?>

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Terlambat
                            </span>

                            <?php elseif($item->status == 'Menunggu'): ?>

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                Menunggu
                            </span>

                            <?php elseif($item->status == 'Disetujui'): ?>

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                Sedang Berjalan
                            </span>

                            <?php elseif($item->status == 'Selesai'): ?>

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Selesai
                            </span>

                            <?php elseif($terlambat): ?>

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm">
                                Jadwal Terlewat
                            </span>

                            <?php elseif($item->status == 'Dibatalkan'): ?>

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Dibatalkan
                            </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4">

                            <div class="flex gap-2">

                                <?php if($item->status == 'Menunggu'): ?>

                                <a href="<?php echo e(route('dokter.konsultasi', $item->id)); ?>"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                                    Mulai

                                </a>

                                <form action="<?php echo e(route('jadwal.batal', $item->id)); ?>" method="POST">

                                    <?php echo csrf_field(); ?>

                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                        Batal

                                    </button>

                                </form>

                                <?php elseif($item->status == 'Selesai'): ?>

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm">

                                    Konsultasi Selesai

                                </span>

                                <?php elseif($item->status == 'Dibatalkan'): ?>

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm">

                                    Dibatalkan

                                </span>

                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="6"
                            class="text-center p-8 text-slate-500">

                            Belum ada jadwal konsultasi

                        </td>

                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- SIDEBAR -->
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h2 class="font-bold mb-5">
                Ringkasan Hari Ini
            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">
                    <span>Total Jadwal</span>
                    <b><?php echo e($totalJadwal); ?></b>
                </div>

                <div class="flex justify-between">
                    <span>Selesai</span>
                    <b class="text-green-600"><?php echo e($totalSelesai); ?></b>
                </div>

                <div class="flex justify-between">
                    <span>Menunggu</span>
                    <b class="text-yellow-500"><?php echo e($totalMenunggu); ?></b>
                </div>

                <div class="flex justify-between">
                    <span>Berjalan</span>
                    <b class="text-blue-600"><?php echo e($totalDisetujui); ?></b>
                </div>

            </div>

        </div>

        <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-3xl p-6">

            <p class="opacity-90">
                Pasien Berikutnya
            </p>

            <?php if($pasienBerikutnya): ?>

            <h2 class="text-2xl font-bold mt-2">

                <?php echo e($pasienBerikutnya->pasien->name); ?>


            </h2>

            <p class="mt-2 opacity-90">

                <?php echo e(\Carbon\Carbon::parse($pasienBerikutnya->tanggal)->format('d M Y')); ?>

                •
                <?php echo e(substr($pasienBerikutnya->jam,0,5)); ?>


            </p>

            <p class="mt-3 text-sm opacity-90">

                <?php echo e($pasienBerikutnya->keluhan); ?>


            </p>

            <?php else: ?>

            <h2 class="text-xl font-bold mt-2">

                Tidak Ada Antrean

            </h2>

            <?php endif; ?>

        </div>

    </div>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/jadwal_dokter.blade.php ENDPATH**/ ?>