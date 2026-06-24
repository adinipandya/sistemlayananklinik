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
            Jadwal Konsultasi
        </h1>

        <p class="text-slate-500">
            Kelola jadwal konsultasi Anda
        </p>

    </div>

</div>
<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Jadwal Aktif
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        <?php echo e($jadwalAktif); ?>

    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Konsultasi Selesai
    </p>

    <h2 class="text-3xl font-bold text-green-600 mt-2">
        <?php echo e($konsultasiSelesai); ?>

    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Total Booking
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        <?php echo e($totalBooking); ?>

    </h2>

</div>


</div>

<!-- JADWAL BERIKUTNYA -->

<div
data-aos="fade-up"
class="bg-green-600 text-white rounded-xl p-6 mb-8
hover:bg-green-700
hover:shadow-lg
transition-all duration-300">


<h2 class="font-semibold text-lg mb-4">
    Jadwal Terdekat
</h2>

<div class="grid md:grid-cols-4 gap-4">

    <div>
        <p class="text-sm text-green-100">
            Dokter
        </p>
        <p class="font-medium">
            Dr. <?php echo e($jadwalTerdekat?->dokter?->nama); ?>

        </p>
    </div>

    <div>
        <p class="text-sm text-green-100">
            Tanggal
        </p>
       <p class="font-medium text-white">
    <?php echo e(\Carbon\Carbon::parse($jadwalTerdekat?->tanggal)->format('d M Y')); ?>

</p>
    </div>

    <div>
        <p class="text-sm text-slate-500">
            Jam
        </p>
        <p class="font-medium">
    <?php echo e(substr($jadwalTerdekat?->jam,0,5)); ?> WIB
</p>
    </div>

    <div>
    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
        <?php echo e($jadwalTerdekat?->status ?? '-'); ?>

    </span>
</div>

</div>


</div>

<!-- TABEL -->

<div
data-aos="fade-up"
data-aos-delay="200"
class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Daftar Jadwal Konsultasi
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>

        <th class="p-4 text-center">No Antrian</th>

            <th class="text-left p-4">
                Dokter
            </th>

            <th class="text-left p-4">
                Tanggal
            </th>

            <th class="text-left p-4">
                Jam
            </th>

            <th class="text-left p-4">
                Status
            </th>

        </tr>

    </thead>

    <tbody>
        <?php $__currentLoopData = $jadwal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-t">

    <td class="p-4 text-center font-semibold text-blue-600">
        <?php echo e($item->nomor_antrian); ?>

    </td>

    <td class="p-4">
        Dr. <?php echo e($item->dokter->nama); ?>

    </td>

    <td class="p-4">
        <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>

    </td>

    <td class="p-4">
        <?php echo e(substr($item->jam,0,5)); ?> WIB
    </td>

    <td class="p-4">

<?php if(
    $item->status == 'Menunggu' &&
    $item->tanggal < now()->toDateString()
): ?>

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
    Tidak Hadir
</span>

<?php elseif($item->status == 'Selesai'): ?>

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
    Selesai
</span>

<?php else: ?>

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
    <?php echo e($item->status); ?>

</span>

<?php endif; ?>

</td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>


</div>

<!-- MODAL BATAL -->

<div id="cancelModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


<div class="bg-white rounded-2xl p-6 w-full max-w-md text-center">

    <h2 class="text-xl font-bold mb-2">
        Batalkan Jadwal?
    </h2>

    <p class="text-slate-500 mb-6">
        Jadwal konsultasi yang dibatalkan tidak dapat dikembalikan.
    </p>

    <div class="flex gap-3">

        <button
            onclick="closeCancelModal()"
            class="flex-1 border border-slate-300 py-3 rounded-lg">

            Kembali

        </button>

        <button
            onclick="closeCancelModal()"
            class="flex-1 bg-red-500 text-white py-3 rounded-lg">

            Ya, Batalkan

        </button>

    </div>

</div>


</div>

<script>

function openDetailModal() {
    document.getElementById('detailModal').classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

function openCancelModal() {
    document.getElementById('cancelModal').classList.remove('hidden');
}

function closeCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/pasien/jadwal_pasien.blade.php ENDPATH**/ ?>