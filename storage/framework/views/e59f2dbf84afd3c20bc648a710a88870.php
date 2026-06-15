<?php $__env->startSection('content'); ?>

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Detail Rekam Medis
        </h1>

        <p class="text-slate-500 mt-2">
            Informasi lengkap hasil pemeriksaan pasien
        </p>

    </div>

</div>

<!-- IDENTITAS -->
<div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

    <div class="flex items-center gap-5">

        <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center">

            <i data-feather="user" class="w-8 h-8 text-blue-600">
            </i>

        </div>

        <div>

            <h2 class="text-2xl font-bold">
                <?php echo e($rekamMedis->jadwal->pasien->name); ?>

            </h2>

            <p class="text-slate-500">
                RM<?php echo e(str_pad($rekamMedis->jadwal->pasien->id, 3, '0', STR_PAD_LEFT)); ?>

            </p>

        </div>

    </div>

    <div class="grid md:grid-cols-4 gap-6 mt-8">

        <div>

            <p class="text-sm text-slate-500">
                Umur
            </p>

            <p class="font-semibold mt-1">
                <?php echo e(\Carbon\Carbon::parse($rekamMedis->jadwal->pasien->tanggal_lahir)->age); ?> Tahun
            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Jenis Kelamin
            </p>

            <p class="font-semibold mt-1">
                <?php echo e($rekamMedis->jadwal->pasien->jenis_kelamin); ?>

            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Dokter
            </p>

            <p class="font-semibold mt-1">
                Dr. <?php echo e($rekamMedis->jadwal->dokter->nama); ?>

            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Tanggal Pemeriksaan
            </p>

            <p class="font-semibold mt-1">
                <?php echo e($rekamMedis->created_at->format('d F Y')); ?>

            </p>

        </div>

    </div>

</div>

<!-- PEMERIKSAAN -->
<div class="grid lg:grid-cols-4 gap-6 mb-6">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Tekanan Darah
        </p>

        <h2 class="text-2xl font-bold mt-2">
            <?php echo e($rekamMedis->tekanan_darah); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Suhu
        </p>

        <h2 class="text-2xl font-bold mt-2">
            <?php echo e($rekamMedis->suhu_tubuh); ?>°C
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Berat Badan
        </p>

        <h2 class="text-2xl font-bold mt-2">
            <?php echo e($rekamMedis->berat_badan); ?> Kg
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Tinggi Badan
        </p>

        <h2 class="text-2xl font-bold mt-2">
            <?php echo e($rekamMedis->tinggi_badan); ?> Cm
        </h2>

    </div>

</div>

<!-- KONTEN -->
<div class="grid lg:grid-cols-2 gap-6">

    <!-- KIRI -->
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h3 class="font-bold text-lg mb-4">
                Keluhan Utama
            </h3>

            <p class="leading-relaxed text-slate-700">
                <?php echo e($rekamMedis->jadwal->keluhan); ?>

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h3 class="font-bold text-lg mb-4">
                Diagnosis
            </h3>

            <p class="leading-relaxed text-slate-700">
                <?php echo e($rekamMedis->diagnosa); ?>

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h3 class="font-bold text-lg mb-4">
                Tindakan Medis
            </h3>

            <p class="leading-relaxed text-slate-700">
                <?php echo e($rekamMedis->tindakan); ?>

            </p>

        </div>

    </div>

    <!-- KANAN -->
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h3 class="font-bold text-lg mb-4">
                Resep Obat
            </h3>

            <div class="overflow-hidden border rounded-2xl">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="p-4 text-left">
                                Obat
                            </th>

                            <th class="p-4 text-left">
                                Dosis
                            </th>

                            <th class="p-4 text-left">
                                Aturan
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $rekamMedis->resepObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t">

                            <td class="p-4">
                                <?php echo e($resep->obat->nama_obat); ?>

                            </td>

                            <td class="p-4">
                                <?php echo e($resep->jumlah); ?>

                            </td>

                            <td class="p-4">
                                <?php echo e($resep->aturan_pakai); ?>

                            </td>

                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="3" class="p-4 text-center text-slate-500">
                                Tidak ada resep obat
                            </td>

                        </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h3 class="font-bold text-lg mb-4">
                Catatan Dokter
            </h3>

            <p class="leading-relaxed text-slate-700">
                <?php echo e($rekamMedis->catatan); ?>

            </p>

        </div>

    </div>

</div>

<!-- FOOTER ACTION -->
<div class="flex justify-end gap-3 mt-8">

    <div class="flex justify-end gap-3 mt-8">

        <a href="/dokter/kelola" class="border px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="arrow-left" class="w-4 h-4"></i>

        </a>

        <a href="<?php echo e(route('rekam-medis.edit', $rekamMedis->id)); ?>"
            class="bg-yellow-500 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="edit-2" class="w-4 h-4"></i>

        </a>

        <a href="/dokter/rekam-medis/print"
            class="bg-blue-600 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="printer" class="w-4 h-4"></i>

        </a>

        <button onclick="confirm('Yakin ingin menghapus rekam medis ini?')"
            class="bg-red-500 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="trash-2" class="w-4 h-4"></i>

        </button>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/detail_rekam.blade.php ENDPATH**/ ?>