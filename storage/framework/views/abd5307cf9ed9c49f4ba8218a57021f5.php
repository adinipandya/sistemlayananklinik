<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6" data-aos="fade-down">
    Konsultasi Pasien 🩺
</h1>


<?php if(session('success')): ?>
    <div data-aos="fade-down"
    class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="grid grid-cols-2 gap-8">

    <!-- INFO PASIEN -->
    <div data-aos="fade-right"
    class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-4">Informasi Pasien</h2>

        <p><b>Nama:</b> Ihsan</p>
        <p><b>Umur:</b> 21 Tahun</p>
        <p><b>Keluhan:</b> Demam</p>
    </div>

    <!-- FORM REKAM MEDIS -->
    <div data-aos="fade-left"
    class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-lg font-semibold mb-4">Isi Rekam Medis</h2>

        <form action="/dokter/konsultasi" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <input type="text" name="nama" placeholder="Nama Pasien"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition">
            </div>

            <div class="mb-4">
                <input type="date" name="tanggal"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition">
            </div>

            <div class="mb-4">
                <input type="text" name="keluhan" placeholder="Keluhan"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition">
            </div>

            <div class="mb-4">
                <input type="text" name="diagnosis" placeholder="Diagnosis"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-green-400 outline-none transition">
            </div>

            <div class="mb-4">
                <textarea name="resep" placeholder="Resep Obat"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-green-400 outline-none transition"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-green-400 text-white py-3 rounded-lg hover:scale-105 transition">
                Simpan Rekam Medis
            </button>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/konsultasi.blade.php ENDPATH**/ ?>