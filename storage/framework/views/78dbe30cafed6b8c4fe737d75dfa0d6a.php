

<?php $__env->startSection('content'); ?>

<div class="flex items-center gap-4 mb-8"
     data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="calendar"
           class="w-7 h-7 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Booking Konsultasi
        </h1>

        <p class="text-slate-500">
            Pilih dokter terlebih dahulu
        </p>

    </div>

</div>

<!-- DOKTER -->
<div class="grid md:grid-cols-3 gap-6">

<?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div
data-aos="fade-up"
class="bg-white border border-slate-200 rounded-2xl p-5 text-center
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

        <i data-feather="user" class="text-blue-600 w-12 h-12"></i>

    </div>

    <h2 class="font-bold text-lg mt-4">
        Dr. <?php echo e($dokter->nama); ?>

    </h2>

    <div class="mt-2 flex justify-center gap-2">

    <?php if($dokter->tersedia): ?>

    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">
        Tersedia
    </span>

    <?php else: ?>

    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs">
        Tidak Praktik
    </span>

    <?php endif; ?>

    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs">
        <?php echo e($dokter->spesialis); ?>

    </span>

</div>

    <p class="text-sm text-slate-400 mt-2">
        <?php echo e($dokter->hari_praktek); ?>

    </p>

    <p class="text-sm text-slate-400">
        <?php echo e($dokter->jam_praktek); ?>

    </p>

    <?php if($dokter->tersedia): ?>

<a
    href="<?php echo e(route('booking.dokter',$dokter->id)); ?>"
    class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

    Pilih Dokter

</a>

<?php else: ?>

<button
    disabled
    class="mt-5 bg-slate-300 text-slate-500 px-5 py-2 rounded-lg cursor-not-allowed">

    Tidak Tersedia

</button>

<?php endif; ?>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/pasien/booking.blade.php ENDPATH**/ ?>