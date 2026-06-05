<?php $__env->startSection('content'); ?>

<div class="mb-8">


<h1 class="text-3xl font-bold text-slate-800">
    Konsultasi Pasien
</h1>

<p class="text-slate-500 mt-1">
    Pemeriksaan dan pencatatan rekam medis pasien
</p>


</div>

<?php if(session('success')): ?>

<div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl mb-6">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="bg-white border border-slate-200 rounded-xl">


<div class="p-6 border-b">

    <h2 class="font-semibold text-lg">
        Form Rekam Medis
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Data pasien otomatis diambil dari halaman Data Pasien
    </p>

</div>

<form action="/dokter/konsultasi" method="POST" class="p-6">

    <?php echo csrf_field(); ?>

    <!-- DATA PASIEN -->
    <div class="grid md:grid-cols-4 gap-4 mb-6">

        <div>
            <label class="block text-sm text-slate-600 mb-2">
                No RM
            </label>

            <input
                type="text"
                value="<?php echo e(request('rm')); ?>"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
        </div>

        <div>
            <label class="block text-sm text-slate-600 mb-2">
                Nama Pasien
            </label>

            <input
                type="text"
                value="<?php echo e(request('nama')); ?>"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
        </div>

        <div>
            <label class="block text-sm text-slate-600 mb-2">
                Umur
            </label>

            <input
                type="text"
                value="<?php echo e(request('umur')); ?> Tahun"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
        </div>

        <div>
            <label class="block text-sm text-slate-600 mb-2">
                Tanggal
            </label>

            <input
                type="date"
                value="<?php echo e(date('Y-m-d')); ?>"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
        </div>

    </div>

    <!-- KELUHAN -->
    <div class="mb-5">

        <label class="block font-medium mb-2">
            Keluhan Utama
        </label>

        <textarea
            name="keluhan"
            rows="3"
            class="w-full border rounded-lg p-3"
            placeholder="Masukkan keluhan pasien..."></textarea>

    </div>

    <!-- PEMERIKSAAN FISIK -->
    <div class="mb-6">

        <h3 class="font-semibold text-lg mb-4">
            Pemeriksaan Fisik
        </h3>

        <div class="grid md:grid-cols-4 gap-4">

            <div>
                <label class="block text-sm mb-2">
                    Tekanan Darah
                </label>

                <input
                    type="text"
                    placeholder="120/80"
                    class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Suhu (°C)
                </label>

                <input
                    type="text"
                    placeholder="36.5"
                    class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Berat Badan
                </label>

                <input
                    type="text"
                    placeholder="65 Kg"
                    class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Tinggi Badan
                </label>

                <input
                    type="text"
                    placeholder="170 Cm"
                    class="w-full border rounded-lg p-3">
            </div>

        </div>

    </div>

    <!-- DIAGNOSIS -->
    <div class="mb-5">

        <label class="block font-medium mb-2">
            Diagnosis
        </label>

        <textarea
            name="diagnosis"
            rows="4"
            class="w-full border rounded-lg p-3"
            placeholder="Masukkan hasil diagnosis..."></textarea>

    </div>

    <!-- TINDAKAN -->
    <div class="mb-5">

        <label class="block font-medium mb-2">
            Tindakan Medis
        </label>

        <textarea
            rows="3"
            class="w-full border rounded-lg p-3"
            placeholder="Masukkan tindakan medis..."></textarea>

    </div>

    <!-- RESEP -->
    <div class="mb-6">

        <h3 class="font-semibold text-lg mb-4">
            Resep Obat
        </h3>

        <div class="grid md:grid-cols-3 gap-4">

            <input
                type="text"
                placeholder="Nama Obat"
                class="border rounded-lg p-3">

            <input
                type="text"
                placeholder="Dosis"
                class="border rounded-lg p-3">

            <input
                type="text"
                placeholder="Aturan Pakai"
                class="border rounded-lg p-3">

        </div>

    </div>

    <!-- CATATAN -->
    <div class="mb-6">

        <label class="block font-medium mb-2">
            Catatan Dokter
        </label>

        <textarea
            rows="3"
            class="w-full border rounded-lg p-3"
            placeholder="Catatan tambahan untuk pasien..."></textarea>

    </div>

    <div class="flex justify-end gap-3">

        <button
            type="reset"
            class="px-5 py-3 border rounded-lg">

            Reset

        </button>

        <button
            type="submit"
            class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">

            Simpan Rekam Medis

        </button>

    </div>

</form>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/konsultasi.blade.php ENDPATH**/ ?>