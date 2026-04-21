<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Halo, Pasien 👋
</h1>

<div class="grid md:grid-cols-3 gap-6">

    <!-- BOOKING -->
    <div data-aos="fade-up"
    class="card-hover glow bg-gradient-to-r from-green-400 to-blue-500 text-white p-6 rounded-xl cursor-pointer">
        <h3 class="font-bold text-lg mb-2">📅 Booking</h3>
        <p>Pesan jadwal dokter</p>
    </div>

    <!-- JADWAL -->
    <div data-aos="fade-up" data-aos-delay="150"
    class="card-hover glow bg-gradient-to-r from-green-400 to-blue-500 text-white p-6 rounded-xl cursor-pointer">
        <h3 class="font-bold text-lg mb-2">🗓️ Jadwal</h3>
        <p>Lihat jadwal konsultasi</p>
    </div>

    <!-- REKAM MEDIS -->
    <div data-aos="fade-up" data-aos-delay="300"
    class="card-hover glow bg-gradient-to-r from-green-400 to-blue-500 text-white p-6 rounded-xl cursor-pointer">
        <h3 class="font-bold text-lg mb-2">📄 Rekam Medis</h3>
        <p>Riwayat kesehatan</p>
    </div>

    <!-- INFO CARD -->
    <div class="card-hover bg-white p-6 rounded-xl shadow-md">
        <h3 class="font-bold mb-2">Jadwal Berikutnya</h3>
        <p class="text-gray-500">Belum ada jadwal</p>
    </div>

    <div class="card-hover bg-white p-6 rounded-xl shadow-md">
        <h3 class="font-bold mb-2">Riwayat Konsultasi</h3>
        <p class="text-gray-500">0 konsultasi</p>
    </div>

    <div class="card-hover bg-white p-6 rounded-xl shadow-md">
        <h3 class="font-bold mb-2">Status Kesehatan</h3>
        <p class="text-green-500 font-semibold">Sehat</p>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/dashboard_pasien.blade.php ENDPATH**/ ?>