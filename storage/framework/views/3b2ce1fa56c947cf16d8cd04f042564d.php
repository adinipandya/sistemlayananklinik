<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6">Halo, Dokter 👋</h1>

<!-- STAT CARDS -->
<div class="grid grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-gray-500 text-sm">Jadwal Hari Ini</h2>
        <p class="text-2xl font-bold mt-2">5</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-gray-500 text-sm">Pasien Hari Ini</h2>
        <p class="text-2xl font-bold mt-2">12</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-gray-500 text-sm">Konsultasi Aktif</h2>
        <p class="text-2xl font-bold mt-2">3</p>
    </div>

</div>

<!-- JADWAL HARI INI -->
<div class="bg-white p-6 rounded-xl shadow mb-8">
    <h2 class="text-lg font-semibold mb-4">Jadwal Hari Ini</h2>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="py-2">Jam</th>
                <th>Pasien</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2">08:00</td>
                <td>Ihsan</td>
                <td>Demam</td>
            </tr>

            <tr class="border-b hover:bg-gray-50">
                <td class="py-2">09:00</td>
                <td>Ardi</td>
                <td>Batuk</td>
            </tr>

            <tr class="hover:bg-gray-50">
                <td class="py-2">10:00</td>
                <td>Dini</td>
                <td>Sakit Kepala</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- AKSI CEPAT -->
<div class="grid grid-cols-2 gap-6">

    <a href="/dokter/konsultasi" 
       class="bg-gradient-to-r from-blue-500 to-green-400 text-white p-6 rounded-xl shadow hover:scale-105 transition">
        <h2 class="text-lg font-semibold">Mulai Konsultasi</h2>
        <p class="text-sm opacity-80">Lihat & tangani pasien</p>
    </a>

    <a href="/dokter/pasien" 
       class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <h2 class="text-lg font-semibold">Data Pasien</h2>
        <p class="text-sm text-gray-500">Lihat semua pasien</p>
    </a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/dashboard_dokter.blade.php ENDPATH**/ ?>