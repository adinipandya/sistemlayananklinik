<?php $__env->startSection('content'); ?>

<div class="mb-8">


    <h1 class="text-3xl font-bold text-slate-800">
        Booking Jadwal Konsultasi
    </h1>

    <p class="text-slate-500 mt-1">
        Pilih dokter dan jadwal konsultasi yang tersedia
    </p>


</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Booking Aktif
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            1
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Konsultasi
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            8
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Dokter Tersedia
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            3
        </h2>

    </div>


</div>

<!-- FORM + INFO -->

<div class="grid lg:grid-cols-2 gap-6">


    <!-- FORM BOOKING -->
    <div class="bg-white border border-slate-200 rounded-xl p-6">

        <h2 class="font-semibold text-lg mb-5">
            Form Booking
        </h2>

        <form action="<?php echo e(route('pasien.booking.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Pilih Dokter
                </label>

                <select name="dokter_id" class="w-full border border-slate-300 rounded-lg p-3">

                    <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($dokter->id); ?>">
                        <?php echo e($dokter->nama); ?>

                    </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Spesialisasi
                </label>

                <select class="w-full border border-slate-300 rounded-lg p-3">

                    <option>Dokter Umum</option>
                    <option>Dokter Gigi</option>

                </select>

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

                <select name="jam" class="w-full border border-slate-300 rounded-lg p-3">

                    <option>08:00</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>13:00</option>
                    <option>15:00</option>

                </select>

            </div>

            <div class="mb-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Keluhan Awal
                </label>

                <textarea name="keluhan" rows="4" class="w-full border border-slate-300 rounded-lg p-3"
                    placeholder="Tuliskan keluhan yang dirasakan..."></textarea>

            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">

                Booking Sekarang

            </button>

        </form>

    </div>

    <!-- INFORMASI -->
    <div class="bg-white border border-slate-200 rounded-xl p-6">

        <h2 class="font-semibold text-lg mb-5">
            Jadwal Dokter Hari Ini
        </h2>

        <div class="space-y-4">

            <div class="border-b pb-3">

                <p class="font-medium">
                    Dr. Ardi
                </p>

                <p class="text-sm text-slate-500">
                    Dokter Umum • 08.00 - 12.00
                </p>

            </div>

            <div class="border-b pb-3">

                <p class="font-medium">
                    Dr. Dini
                </p>

                <p class="text-sm text-slate-500">
                    Dokter Gigi • 13.00 - 16.00
                </p>

            </div>

            <div>

                <p class="font-medium">
                    Dr. Ihsan
                </p>

                <p class="text-sm text-slate-500">
                    Dokter Umum • 08.00 - 15.00
                </p>

            </div>

        </div>

        <div class="mt-8 p-4 bg-blue-50 rounded-xl border border-blue-100">

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


</div>

<!-- RIWAYAT -->

<div class="mt-8 bg-white border border-slate-200 rounded-xl overflow-hidden">


    <div class="p-5 border-b">

        <h2 class="font-semibold text-slate-700">
            Riwayat Booking
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left p-4">
                    Tanggal
                </th>

                <th class="text-left p-4">
                    Dokter
                </th>

                <th class="text-left p-4">
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr class="border-t">

                <td class="p-4">
                    <?php echo e($item->tanggal); ?>

                </td>

                <td class="p-4">
                    <?php echo e($item->dokter->nama); ?>

                </td>

                <td class="p-4">

                    <span class="px-3 py-1 rounded-full text-sm">

                        <?php echo e($item->status); ?>


                    </span>

                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="3" class="p-4 text-center">

                    Belum ada booking

                </td>

            </tr>

            <?php endif; ?>

        </tbody>

    </table>


</div>

<!-- POPUP -->

<div id="popup" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-full max-w-sm">

        <div class="text-5xl mb-3">
            ✅
        </div>

        <h2 class="text-xl font-bold mb-2">
            Booking Berhasil
        </h2>

        <p class="text-slate-500 mb-2">
            Nomor Antrian
        </p>

        <p class="text-3xl font-bold text-blue-600 mb-4">
            A-001
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/booking.blade.php ENDPATH**/ ?>