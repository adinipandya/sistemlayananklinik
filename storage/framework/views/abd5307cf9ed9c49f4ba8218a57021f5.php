<?php $__env->startSection('content'); ?>

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Konsultasi Pasien
        </h1>

        <p class="text-slate-500 mt-2">
            Pemeriksaan dan pencatatan rekam medis pasien
        </p>

    </div>

</div>

<form action="<?php echo e(route('rekam-medis.store', $jadwal->id)); ?>" method="POST">

    <?php echo csrf_field(); ?>

    <div class="grid lg:grid-cols-4 gap-6">

        <!-- FORM -->
        <div class="lg:col-span-3 space-y-6">

            <!-- DATA PASIEN -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold text-lg mb-6">
                    Informasi Pasien
                </h2>

                <div class="grid md:grid-cols-4 gap-4">

                    <div>

                        <label class="text-sm text-slate-500">
                            No Rekam Medis
                        </label>

                        <input value="RM<?php echo e(str_pad($jadwal->pasien->id, 3, '0', STR_PAD_LEFT)); ?>" readonly
                            class="w-full mt-2 bg-slate-100 rounded-xl p-3 border">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Nama Pasien
                        </label>

                        <input value="<?php echo e($jadwal->pasien->name); ?>" readonly
                            class="w-full mt-2 bg-slate-100 rounded-xl p-3 border">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Umur
                        </label>

                        <input value="<?php echo e(\Carbon\Carbon::parse($jadwal->pasien->tanggal_lahir)->age); ?> Tahun" readonly
                            class="w-full mt-2 bg-slate-100 rounded-xl p-3 border">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Tanggal
                        </label>

                        <input value="<?php echo e($jadwal->tanggal); ?>" readonly
                            class="w-full mt-2 bg-slate-100 rounded-xl p-3 border">

                    </div>

                </div>

            </div>

            <!-- KELUHAN -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-4">
                    Keluhan Utama
                </h2>

                <textarea rows="4" readonly class="w-full border rounded-2xl p-4"><?php echo e($jadwal->keluhan); ?></textarea>

            </div>

            <!-- PEMERIKSAAN -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-5">
                    Pemeriksaan Fisik
                </h2>

                <div class="grid md:grid-cols-4 gap-4">

                    <div>

                        <label class="text-sm text-slate-500">
                            Tekanan Darah
                        </label>

                        <input name="tekanan_darah" placeholder="120/80" class="w-full mt-2 border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Suhu Tubuh
                        </label>

                        <input name="suhu_tubuh" placeholder="36.5" class="w-full mt-2 border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Berat Badan
                        </label>

                        <input name="berat_badan" placeholder="65 Kg" class="w-full mt-2 border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="text-sm text-slate-500">
                            Tinggi Badan
                        </label>

                        <input name="tinggi_badan" placeholder="170 Cm" class="w-full mt-2 border rounded-xl p-3">

                    </div>

                </div>

            </div>

            <!-- DIAGNOSA -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-4">
                    Diagnosis
                </h2>

                <textarea name="diagnosa" rows="5" class="w-full border rounded-2xl p-4"
                    placeholder="Masukkan hasil diagnosis..."></textarea>

            </div>

            <!-- TINDAKAN -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-4">
                    Tindakan Medis
                </h2>

                <textarea name="tindakan" rows="4" class="w-full border rounded-2xl p-4"
                    placeholder="Masukkan tindakan medis..."></textarea>

            </div>

            <!-- RESEP -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <div class="flex justify-between items-center mb-5">

                    <h2 class="font-bold">
                        Resep Obat
                    </h2>

                    <button type="button" onclick="tambahObat()" class="bg-blue-600 text-white px-4 py-2 rounded-xl">

                        + Tambah Obat

                    </button>

                </div>

                <div id="obatContainer">

                    <div class="grid md:grid-cols-3 gap-4 mb-4">

                        <select name="obat_id[]" class="border rounded-xl p-3">

                            <option value="">
                                Pilih Obat
                            </option>

                            <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($item->id); ?>">
                                <?php echo e($item->nama_obat); ?>

                                (Stok: <?php echo e($item->stok); ?>)
                            </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                        <input type="number" name="jumlah[]" placeholder="Jumlah" class="border rounded-xl p-3">

                        <input type="text" name="aturan_pakai[]" placeholder="Aturan Pakai"
                            class="border rounded-xl p-3">

                    </div>

                </div>

            </div>

            <!-- CATATAN -->
            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-4">
                    Catatan Dokter
                </h2>

                <textarea name="catatan" rows="4" class="w-full border rounded-2xl p-4"
                    placeholder="Catatan tambahan..."></textarea>

            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-4">

                <div class="flex justify-between items-center mt-6">

                    <a href="<?php echo e(url()->previous()); ?>"
                        class="flex items-center justify-center
                        px-6 py-3
                        bg-slate-200 hover:bg-slate-300
                        rounded-2xl font-medium">

                        <i data-feather="arrow-left" class="w-5 h-5 mr-2"></i>

                        Kembali

                    </a>

                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl">

                        Simpan Rekam Medis

                    </button>

                </div>

            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="space-y-6">

            <div class="bg-white rounded-3xl shadow-sm p-6">

                <h2 class="font-bold mb-5">
                    Antrian Pasien
                </h2>

                <div class="space-y-4">

                    <?php $__empty_1 = true; $__currentLoopData = $antrian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="p-4 rounded-2xl
            <?php echo e($item->id == $jadwal->id
                ? 'bg-blue-50 border border-blue-200'
                : 'bg-slate-50'); ?>">

                        <h3 class="font-semibold">
                            <?php echo e($item->pasien->name); ?>

                        </h3>

                        <p class="text-sm text-slate-500">
                            <?php echo e($item->keluhan); ?>

                        </p>

                        <p class="text-xs text-slate-400 mt-2">
                            <?php echo e($item->tanggal); ?>

                        </p>

                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="p-4 rounded-2xl bg-slate-50 text-slate-500">

                        Tidak ada antrian pasien

                    </div>

                    <?php endif; ?>

                </div>

            </div>

            <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-3xl p-6">

                <h3 class="font-bold text-lg">
                    Status Konsultasi
                </h3>

                <p class="mt-3">
                    Sedang berlangsung
                </p>

            </div>

        </div>

    </div>

    </div>

</form>

<script>
    function tambahObat() {
        let html = `
        <div class="grid md:grid-cols-3 gap-4 mb-4">

            <select
                name="obat_id[]"
                class="border rounded-xl p-3">

                <option value="">
                    Pilih Obat
                </option>

                <?php $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($item->id); ?>">
                        <?php echo e($item->nama_obat); ?>

                        (Stok: <?php echo e($item->stok); ?>)
                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>

            <input
                type="number"
                name="jumlah[]"
                placeholder="Jumlah"
                class="border rounded-xl p-3">

            <input
                type="text"
                name="aturan_pakai[]"
                placeholder="Aturan Pakai"
                class="border rounded-xl p-3">

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
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/konsultasi.blade.php ENDPATH**/ ?>