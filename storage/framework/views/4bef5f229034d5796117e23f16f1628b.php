

<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Dashboard Admin 🛠️
</h1>

<!-- STAT CARDS -->
<div class="grid grid-cols-4 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition duration-300 animate-fadeInUp">
        <h2 class="text-gray-500 text-sm">Total Dokter</h2>
        <p class="text-2xl font-bold mt-2">5</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition duration-300 animate-fadeInUp delay-1">
        <h2 class="text-gray-500 text-sm">Total Pasien</h2>
        <p class="text-2xl font-bold mt-2">20</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition duration-300 animate-fadeInUp delay-2">
        <h2 class="text-gray-500 text-sm">Jadwal Hari Ini</h2>
        <p class="text-2xl font-bold mt-2">8</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl hover:-translate-y-2 transition duration-300 animate-fadeInUp delay-3">
        <h2 class="text-gray-500 text-sm">Rekam Medis</h2>
        <p class="text-2xl font-bold mt-2">15</p>
    </div>

</div>

<!-- DATA TERBARU -->
<div class="grid grid-cols-2 gap-6">

    <!-- DOKTER -->
    <div class="bg-white p-6 rounded-xl shadow animate-fadeInUp delay-2">
        <h2 class="text-lg font-semibold mb-4">Dokter Terbaru</h2>

        <ul class="space-y-2 text-gray-600">
            <li class="hover:translate-x-2 transition">Dr. Ardi</li>
            <li class="hover:translate-x-2 transition">Dr. Dini</li>
            <li class="hover:translate-x-2 transition">Dr. Ihsan</li>
        </ul>
    </div>

    <!-- PASIEN -->
    <div class="bg-white p-6 rounded-xl shadow animate-fadeInUp delay-3">
        <h2 class="text-lg font-semibold mb-4">Pasien Terbaru</h2>

        <ul class="space-y-2 text-gray-600">
            <li class="hover:translate-x-2 transition">Ihsan</li>
            <li class="hover:translate-x-2 transition">Ardi</li>
            <li class="hover:translate-x-2 transition">Dini</li>
        </ul>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/dashboard_admin.blade.php ENDPATH**/ ?>