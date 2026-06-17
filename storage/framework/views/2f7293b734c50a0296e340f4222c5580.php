<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Resep Obat</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <div class="max-w-4xl mx-auto p-10">

        
        <div class="border-b-2 border-slate-300 pb-5 mb-8">

            <div class="flex justify-between items-center">

                <div class="flex items-center gap-4">

                    <img
                        src="<?php echo e(asset('images/poltek.png')); ?>"
                        class="w-14 h-14 object-contain">


                    <div>

                        <h1 class="font-bold text-xl">
                            KLINIK POLIBATAM
                        </h1>

                        <p class="text-sm text-slate-600">
                            Sistem Layanan Klinik Digital
                        </p>

                        <p class="text-sm text-slate-600">
                            Politeknik Negeri Batam
                        </p>

                    </div>

                </div>

                <div class="text-right">

                    <p class="text-sm text-slate-500">
                        No. Resep
                    </p>

                    <p class="text-2xl font-bold">
                        RSP<?php echo e(str_pad($rekamMedis->id, 3, '0', STR_PAD_LEFT)); ?>

                    </p>

                </div>

            </div>

        </div>

        
        <h2 class="text-center font-bold text-lg uppercase mb-8">
            Resep Obat
        </h2>

        
        <div class="border rounded-xl p-6 mb-8">

            <h3 class="font-bold mb-4">
                Informasi Pasien
            </h3>

            <div class="grid grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">Nama Pasien</p>
                    <p class="font-semibold">
                        <?php echo e($rekamMedis->jadwal->pasien->name); ?>

                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Resep</p>
                    <p class="font-semibold">
                        <?php echo e($rekamMedis->created_at->format('d F Y')); ?>

                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Dokter</p>
                    <p class="font-semibold">
                        <?php echo e($rekamMedis->jadwal->dokter->nama); ?>

                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Jumlah Obat</p>
                    <p class="font-semibold">
                        <?php echo e($rekamMedis->resepObat->count()); ?> Obat
                    </p>
                </div>

            </div>

        </div>

        
        <h3 class="font-bold mb-3">
            Daftar Resep Obat
        </h3>

        <table class="w-full border border-slate-300 mb-10">

            <thead>

                <tr class="bg-slate-100">

                    <th class="border p-3 text-left">No</th>
                    <th class="border p-3 text-left">Nama Obat</th>
                    <th class="border p-3 text-left">Jumlah</th>
                    <th class="border p-3 text-left">Aturan Pakai</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $rekamMedis->resepObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td class="border p-3">
                        <?php echo e($loop->iteration); ?>

                    </td>

                    <td class="border p-3">
                        <?php echo e($resep->obat->nama_obat); ?>

                    </td>

                    <td class="border p-3">
                        <?php echo e($resep->jumlah); ?>

                    </td>

                    <td class="border p-3">
                        <?php echo e($resep->aturan_pakai); ?>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

        
        <div class="flex justify-end mt-16">

            <div class="text-center">

                <p>
                    Batam,
                    <?php echo e(now()->translatedFormat('d F Y')); ?>

                </p>

                <p class="mb-20">
                    Dokter Pemeriksa
                </p>

                <p class="font-bold">
                    <?php echo e($rekamMedis->jadwal->dokter->nama); ?>

                </p>

            </div>

        </div>

    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>

</body>

</html><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/cetak_resep.blade.php ENDPATH**/ ?>