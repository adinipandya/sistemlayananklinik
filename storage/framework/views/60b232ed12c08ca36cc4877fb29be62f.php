<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="bg-green-100 border border-green-200 text-green-700 p-4 rounded-xl mb-6">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Jadwal Praktik
    </h1>

    <p class="text-slate-500 mt-1">
        Daftar jadwal konsultasi pasien hari ini
    </p>

</div>

<!-- RINGKASAN -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Jadwal
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            5
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Menunggu
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            2
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Selesai
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            3
        </h2>

    </div>

</div>

<!-- TABEL JADWAL -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">

    <div class="p-5 border-b">

        <h2 class="font-semibold text-slate-700">
            Jadwal Konsultasi Hari Ini
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left p-4">
                    Jam
                </th>

                <th class="text-left p-4">
                    Nama Pasien
                </th>

                <th class="text-left p-4">
                    Keluhan
                </th>

                <th class="text-left p-4">
                    Status
                </th>

                <th class="text-left p-4">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <tr class="border-t">

                <td class="p-4">
                    08:00
                </td>

                <td class="p-4">
                    Ihsan
                </td>

                <td class="p-4">
                    Demam
                </td>

                <td class="p-4">

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Menunggu
                    </span>

                </td>

                <td>

                    <div class="flex gap-2">

                        <a href="/dokter/konsultasi?rm=RM001&nama=Ihsan&umur=21"
                            class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600">

                            Mulai

                        </a>

                        <button onclick="openCancelModal()"
                            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600">

                            Batal

                        </button>

                    </div>

                </td>

            </tr>

            <tr class="border-t">

                <td class="p-4">
                    09:00
                </td>

                <td class="p-4">
                    Ardi
                </td>

                <td class="p-4">
                    Batuk
                </td>

                <td class="p-4">

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Selesai
                    </span>

                </td>

                <td class="p-4">

                    <span class="text-slate-400">
                        -
                    </span>

                </td>

            </tr>

            <tr class="border-t">

                <td class="p-4">
                    10:00
                </td>

                <td class="p-4">
                    Dini
                </td>

                <td class="p-4">
                    Sakit Kepala
                </td>

                <td class="p-4">

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Menunggu
                    </span>

                </td>

                <td>

                    <div class="flex gap-2">

                        <a href="/dokter/konsultasi?rm=RM001&nama=Ihsan&umur=21"
                            class="bg-blue-500 text-white px-3 py-2 rounded-lg hover:bg-blue-600">

                            Mulai

                        </a>

                        <button onclick="openCancelModal()"
                            class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600">

                            Batal

                        </button>

                    </div>

                </td>

            </tr>

        </tbody>

    </table>

</div>

<!-- MODAL BATAL KONSULTASI -->
<div id="cancelModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-md p-6">

        <h2 class="text-xl font-bold mb-2">
            Batalkan Konsultasi
        </h2>

        <p class="text-slate-500 mb-5">
            Status pasien akan berubah menjadi
            <b>"Dibatalkan oleh Dokter"</b>
        </p>

        <div class="mb-4">

            <label class="block text-sm font-medium mb-2">
                Alasan Pembatalan
            </label>

            <select
            class="w-full border border-slate-300 rounded-lg p-3">

                <option>
                    Dokter berhalangan hadir
                </option>

                <option>
                    Pasien tidak hadir
                </option>

                <option>
                    Gangguan sistem
                </option>

                <option>
                    Jadwal bentrok
                </option>

            </select>

        </div>

        <div class="mb-5">

            <textarea
            placeholder="Keterangan tambahan (opsional)"
            rows="3"
            class="w-full border border-slate-300 rounded-lg p-3"></textarea>

        </div>

        <div class="flex gap-3">

            <button
            onclick="closeCancelModal()"
            class="flex-1 border border-slate-300 py-3 rounded-lg">

                Kembali

            </button>

            <form
            action="<?php echo e(route('jadwal.batal',1)); ?>"
            method="POST"
            class="flex-1">

                <?php echo csrf_field(); ?>

                <button
                class="w-full bg-red-500 text-white py-3 rounded-lg hover:bg-red-600">

                    Ya, Batalkan

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function openCancelModal() {
    document
        .getElementById('cancelModal')
        .classList.remove('hidden');
}

function closeCancelModal() {
    document
        .getElementById('cancelModal')
        .classList.add('hidden');
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/jadwal_dokter.blade.php ENDPATH**/ ?>