<?php $__env->startSection('content'); ?>

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Edit Rekam Medis
        </h1>

        <p class="text-slate-500 mt-2">
            Perbarui hasil pemeriksaan dan tindakan medis pasien
        </p>

    </div>

</div>

<form action="<?php echo e(route('rekam-medis.update', $rekamMedis->id)); ?>" method="POST">

    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <!-- IDENTITAS -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-6">
            Informasi Pasien
        </h2>

        <div class="grid md:grid-cols-4 gap-5">

            <div>

                <label class="text-sm text-slate-500">
                    No Rekam Medis
                </label>

                <input value="RM<?php echo e(str_pad($rekamMedis->jadwal->pasien->id, 3, '0', STR_PAD_LEFT)); ?>" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Nama Pasien
                </label>

                <input value="<?php echo e($rekamMedis->jadwal->pasien->name); ?>" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Umur
                </label>

                <input value="<?php echo e(\Carbon\Carbon::parse($rekamMedis->jadwal->pasien->tanggal_lahir)->age); ?> Tahun"
                    readonly class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Tanggal
                </label>

                <input value="<?php echo e($rekamMedis->created_at->format('d F Y')); ?>" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

        </div>

    </div>

    <!-- PEMERIKSAAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-6">
            Pemeriksaan Fisik
        </h2>

        <div class="grid md:grid-cols-4 gap-5">

            <div>

                <label class="text-sm text-slate-500">
                    Tekanan Darah
                </label>

                <input type="text" name="tekanan_darah" value="<?php echo e($rekamMedis->tekanan_darah); ?>"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Suhu Tubuh
                </label>

                <input type="text" name="suhu_tubuh" value="<?php echo e($rekamMedis->suhu_tubuh); ?>"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Berat Badan
                </label>

                <input type="text" name="berat_badan" value="<?php echo e($rekamMedis->berat_badan); ?>"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Tinggi Badan
                </label>

                <input type="text" name="tinggi_badan" value="<?php echo e($rekamMedis->tinggi_badan); ?>"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

        </div>

    </div>

    <!-- KELUHAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Keluhan Utama
        </h2>

        <textarea name="keluhan" rows="4"
            class="w-full border rounded-2xl p-4"><?php echo e($rekamMedis->jadwal->keluhan); ?></textarea>

    </div>

    <!-- DIAGNOSA -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Diagnosis
        </h2>

        <textarea name="diagnosa" rows="5" class="w-full border rounded-2xl p-4"><?php echo e($rekamMedis->diagnosa); ?></textarea>

    </div>

    <!-- TINDAKAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Tindakan Medis
        </h2>

        <textarea name="tindakan" rows="4" class="w-full border rounded-2xl p-4"><?php echo e($rekamMedis->tindakan); ?></textarea>

    </div>

    <!-- RESEP -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="font-bold text-xl">
                Resep Obat
            </h2>

            <button type="button" onclick="tambahObat()" class="bg-blue-600 text-white px-4 py-2 rounded-xl">

                + Tambah Obat

            </button>

        </div>

        <div id="obatContainer">

            <?php $__empty_1 = true; $__currentLoopData = $rekamMedis->resepObat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="grid md:grid-cols-3 gap-4 mb-4">

                <select name="obat_id[]" class="border rounded-2xl p-3">

                    <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $resep->obat_id ? 'selected' : ''); ?>>

                        <?php echo e($item->nama_obat); ?>


                    </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <input type="number" name="jumlah[]" value="<?php echo e($resep->jumlah); ?>" class="border rounded-2xl p-3">

                <input type="text" name="aturan_pakai[]" value="<?php echo e($resep->aturan_pakai); ?>"
                    class="border rounded-2xl p-3">

            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="grid md:grid-cols-3 gap-4 mb-4">

                <select name="obat_id[]" class="border rounded-2xl p-3">

                    <option value="">
                        Pilih Obat
                    </option>

                    <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($item->id); ?>">
                        <?php echo e($item->nama_obat); ?>

                    </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <input type="number" name="jumlah[]" placeholder="Jumlah" class="border rounded-2xl p-3">

                <input type="text" name="aturan_pakai[]" placeholder="Aturan Pakai" class="border rounded-2xl p-3">

            </div>

            <?php endif; ?>

        </div>

    </div>

    <!-- CATATAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-8">

        <h2 class="font-bold text-xl mb-4">
            Catatan Dokter
        </h2>

        <textarea name="catatan" rows="4" class="w-full border rounded-2xl p-4"><?php echo e($rekamMedis->catatan); ?></textarea>

    </div>

    <!-- BUTTON -->
    <div class="flex justify-end gap-3">

        <a href="<?php echo e(route('rekam-medis.detail', $rekamMedis->id)); ?>" class="border px-6 py-3 rounded-2xl">

            Batal

        </a>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl">

            Simpan Perubahan

        </button>

    </div>

</form>

<script>
    function tambahObat() {
        let html = `
        <div class="grid md:grid-cols-3 gap-4 mb-4">

            <select
                name="obat_id[]"
                class="border rounded-2xl p-3">

                <option value="">
                    Pilih Obat
                </option>

                <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($item->id); ?>">
                        <?php echo e($item->nama_obat); ?>

                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>

            <input
                type="number"
                name="jumlah[]"
                placeholder="Jumlah"
                class="border rounded-2xl p-3">

            <input
                type="text"
                name="aturan_pakai[]"
                placeholder="Aturan Pakai"
                class="border rounded-2xl p-3">

        </div>
    `;

        document
            .getElementById('obatContainer')
            .insertAdjacentHTML(
                'beforeend',
                html
            );
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/edit_rekam.blade.php ENDPATH**/ ?>