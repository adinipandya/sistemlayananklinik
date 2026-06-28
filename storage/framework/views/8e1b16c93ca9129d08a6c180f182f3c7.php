<?php $__env->startSection('content'); ?>

<div class="mb-8 flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Edit Rekam Medis
        </h1>

        <p class="text-slate-500 mt-1">
            Perbarui data rekam medis pasien
        </p>

    </div>

    <a href="/dokter/rekam-medis/detail"
    class="border border-slate-300 px-4 py-2 rounded-lg hover:bg-slate-50">

        Kembali

    </a>

</div>

<div class="bg-white border border-slate-200 rounded-xl">

    <form action="<?php echo e(route('rekam_medis.update',1)); ?>"
    method="POST"
    class="p-6">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- DATA PASIEN -->
        <div class="grid md:grid-cols-4 gap-4 mb-6">

            <div>
                <label class="block text-sm mb-2">
                    No RM
                </label>

                <input
                type="text"
                value="RM001"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Nama Pasien
                </label>

                <input
                type="text"
                value="Ihsan"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Umur
                </label>

                <input
                type="text"
                value="21 Tahun"
                readonly
                class="w-full bg-slate-100 border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm mb-2">
                    Tanggal
                </label>

                <input
                type="date"
                value="2026-04-20"
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
            class="w-full border rounded-lg p-3">Demam tinggi, batuk dan pilek selama 3 hari.</textarea>

        </div>

        <!-- PEMERIKSAAN -->
        <div class="mb-6">

            <h3 class="font-semibold mb-4">
                Pemeriksaan Fisik
            </h3>

            <div class="grid md:grid-cols-4 gap-4">

                <input
                type="text"
                value="120/80"
                class="border rounded-lg p-3">

                <input
                type="text"
                value="38.2"
                class="border rounded-lg p-3">

                <input
                type="text"
                value="65 Kg"
                class="border rounded-lg p-3">

                <input
                type="text"
                value="170 Cm"
                class="border rounded-lg p-3">

            </div>

        </div>

        <!-- DIAGNOSIS -->
        <div class="mb-5">

            <label class="block font-medium mb-2">
                Diagnosis
            </label>

            <textarea
            name="diagnosa"
            rows="4"
            class="w-full border rounded-lg p-3">Influenza ringan (ISPA ringan).</textarea>

        </div>

        <!-- TINDAKAN -->
        <div class="mb-5">

            <label class="block font-medium mb-2">
                Tindakan Medis
            </label>

            <textarea
            rows="3"
            class="w-full border rounded-lg p-3">Istirahat cukup dan observasi selama 3 hari.</textarea>

        </div>

        <!-- RESEP -->
        <div class="mb-5">

            <label class="block font-medium mb-2">
                Resep Obat
            </label>

            <textarea
            name="resep"
            rows="3"
            class="w-full border rounded-lg p-3">Paracetamol 500mg, Vitamin C 500mg</textarea>

        </div>

        <!-- CATATAN -->
        <div class="mb-6">

            <label class="block font-medium mb-2">
                Catatan Dokter
            </label>

            <textarea
            rows="3"
            class="w-full border rounded-lg p-3">Kontrol kembali 3 hari jika belum membaik.</textarea>

        </div>

        <div class="flex justify-end gap-3">

            <a href="/dokter/rekam-medis/detail"
            class="px-5 py-3 border rounded-lg">

                Batal

            </a>

            <button
            type="submit"
            class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistemlayananklinik\resources\views/dokter/edit_rekam.blade.php ENDPATH**/ ?>