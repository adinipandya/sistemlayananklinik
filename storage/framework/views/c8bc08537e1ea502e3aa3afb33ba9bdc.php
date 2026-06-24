<?php $__env->startSection('content'); ?>

<!-- STATISTIK -->
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
            Lengkapi jadwal konsultasi dengan dokter pilihan Anda
        </p>

    </div>

</div>

<a href="/pasien/booking"
class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 mb-6">

Pilih Dokter Lain

</a>
<!-- FORM + INFO -->

<div class="grid lg:grid-cols-2 gap-6">
    <!-- INFORMASI -->
    <div
data-aos="fade-up"
data-aos-delay="100"
class="bg-white border border-slate-200 rounded-xl p-6">

    <h2 class="font-semibold text-lg mb-5">
        Profil Dokter
    </h2>

    <div class="text-center border-b pb-5">

        <div class="w-24 h-24 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
            <i data-feather="user" class="w-12 h-12 text-blue-600"></i>
        </div>

        <h3 class="font-bold text-xl mt-4">
            Dr. <?php echo e($dokter->nama); ?>

        </h3>

        <p class="text-blue-600 font-medium mt-1">
    Dokter <?php echo e($dokter->spesialis); ?>

</p>

    </div>

    <div class="grid grid-cols-2 gap-3 mt-5">

    <div class="bg-slate-50 p-3 rounded-lg">
        <p class="text-xs text-slate-500">
            Hari Praktik
        </p>
        <p class="font-semibold">
            <?php echo e($dokter->hari_praktek); ?>

        </p>
    </div>

    <div class="bg-slate-50 p-3 rounded-lg">
        <p class="text-xs text-slate-500">
            Jam Praktik
        </p>
        <p class="font-semibold">
            <?php echo e($dokter->jam_praktek); ?>

        </p>
    </div>

</div>

    <div class="mt-6 p-4 bg-blue-50 rounded-xl border border-blue-100">

        <h3 class="font-medium text-blue-700 mb-2">
            Informasi Booking
        </h3>

        <ul class="text-sm text-slate-600 space-y-1">

            <li>• Datang 10 menit sebelum jadwal</li>
            <li>• Membawa kartu identitas</li>
            <li>• Membawa kartu BPJS (jika ada)</li>
            <li>• Booking dapat dibatalkan sebelum jadwal dimulai</li>

        </ul>

    </div>

</div>


    <!-- FORM BOOKING -->
    <div
data-aos="fade-up"
data-aos-delay="200"
class="bg-white border border-slate-200 rounded-xl p-6">

        <h2 class="font-semibold text-lg mb-5">
            Form Booking
        </h2>
        <?php if(session('error')): ?>

<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

    <?php echo e(session('error')); ?>


</div>

<?php endif; ?>

<?php if(session('success')): ?>

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

    <?php echo e(session('success')); ?>


</div>

<?php endif; ?>

        <form action="<?php echo e(route('booking.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="mb-4">

                <input
type="hidden"
name="dokter_id"
value="<?php echo e($dokter->id); ?>">

            </div>

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Tanggal Konsultasi
                </label>

                <input type="date" name="tanggal" class="w-full border border-slate-300 rounded-lg p-3">

            </div>

            <div class="mb-4">

<label class="block text-sm text-slate-600 mb-2">
Jam Konsultasi
</label>

<select id="jamSelect"
name="jam"
class="w-full border border-slate-300 rounded-lg p-3">

</select>

</div>

            <div class="mb-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Keluhan Awal
                </label>

                <textarea name="keluhan" rows="4" class="w-full border border-slate-300 rounded-lg p-3"
                    placeholder="Tuliskan keluhan yang dirasakan..."></textarea>

            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 hover:scale-[1.02] transition-all duration-300 text-white py-3 rounded-xl shadow-lg">

                Booking Sekarang

            </button>

        </form>

        <script>

const jamSelect =
document.getElementById('jamSelect');

let jamPraktek =
"<?php echo e($dokter->jam_praktek); ?>";

let parts =
jamPraktek.split('-');

let start =
parseInt(parts[0]);

let end =
parseInt(parts[1]);

for(let i=start; i<=end; i++){

    let jam =
    String(i).padStart(2,'0') + ':00';

    jamSelect.innerHTML +=
    `<option value="${jam}">
        ${jam}
    </option>`;
}

</script>

    </div>

    </div>
<!-- POPUP -->

<div id="popup" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-full max-w-sm">

        <h2 class="text-xl font-bold mb-2">
            Booking Berhasil
        </h2>

        <p class="text-slate-500 mb-2">
            Nomor Antrian
        </p>

        <p class="text-3xl font-bold text-blue-600 mb-4">
    <?php echo e(session('nomor_antrian')); ?>

</p>

        <p class="text-sm text-slate-500 mb-6">
            Silakan datang 10 menit sebelum jadwal konsultasi.
        </p>

        <button onclick="closePopup()" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

            Tutup

        </button>

    </div>


</div>

<script>
    function showSuccess() {
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script>

<?php if(session('success')): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('popup').classList.remove('hidden');
});
</script>
<?php endif; ?>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/pasien/booking_form.blade.php ENDPATH**/ ?>