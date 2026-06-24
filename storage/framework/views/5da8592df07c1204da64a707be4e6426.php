<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto space-y-6">

    <h1 class="text-3xl font-bold text-slate-800">
        Detail Resep Obat
    </h1>

    
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-6">
            Informasi Pasien
        </h2>

        <div class="grid md:grid-cols-5 gap-6">

            <div>
                <p class="text-slate-500 text-sm">
                    No Rekam Medis
                </p>

                <p class="font-semibold">
                    <?php echo e($rekamMedis->no_rekam_medis); ?>

                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Nama Pasien
                </p>

                <p class="font-semibold">
                    <?php echo e($rekamMedis->jadwal->pasien->name); ?>

                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Dokter
                </p>

                <p class="font-semibold">
                    <?php echo e($rekamMedis->jadwal->dokter->nama ?? '-'); ?>

                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Tanggal Resep
                </p>

                <p class="font-semibold">
                    <?php echo e($rekamMedis->created_at->format('d M Y')); ?>

                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Diagnosa
                </p>

                <p class="font-semibold">
                    <?php echo e($rekamMedis->diagnosa); ?>

                </p>
            </div>

        </div>

    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-6">
            Daftar Obat
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b">

                        <th class="text-left py-3">
                            No
                        </th>

                        <th class="text-left py-3">
                            Nama Obat
                        </th>

                        <th class="text-left py-3">
                            Jumlah
                        </th>

                        <th class="text-left py-3">
                            Aturan Pakai
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $rekamMedis->resepObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="py-3">
                            <?php echo e($loop->iteration); ?>

                        </td>

                        <td class="py-3 font-medium">
                            <?php echo e($resep->obat->nama_obat); ?>

                        </td>

                        <td class="py-3">
                            <?php echo e($resep->jumlah); ?>

                        </td>

                        <td class="py-3">
                            <?php echo e($resep->aturan_pakai); ?>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="4" class="text-center py-6 text-slate-500">

                            Tidak ada resep obat

                        </td>

                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-4">
            Catatan Dokter
        </h2>

        <p class="text-slate-700">
            <?php echo e($rekamMedis->catatan ?? '-'); ?>

        </p>

    </div>

    <a href="<?php echo e(route('resep.index')); ?>" class="inline-flex items-center text-blue-600 font-medium">

        ← Kembali

    </a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/detail_resep.blade.php ENDPATH**/ ?>