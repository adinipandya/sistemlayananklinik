<?php $__env->startSection('content'); ?>

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Data Pasien
        </h1>

        <p class="text-slate-500 mt-2">
            Daftar seluruh pasien Klinik Polibatam
        </p>

    </div>

</div>

<!-- STAT CARD -->
<div class="grid lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-slate-500 text-sm">
            Total Pasien
        </p>

        <h2 class="text-4xl font-bold mt-2">
            <?php echo e($pasien->count()); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-slate-500 text-sm">
            Pasien Hari Ini
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            <?php echo e($pasienHariIni); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-slate-500 text-sm">
            Pasien Baru
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            <?php echo e($pasienBaru); ?>

        </h2>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <p class="text-slate-500 text-sm">
            Kunjungan Bulan Ini
        </p>

        <h2 class="text-4xl font-bold mt-2 text-purple-600">
            <?php echo e($kunjunganBulanIni); ?>

        </h2>

    </div>

</div>

<!-- SEARCH -->
<div class="bg-white rounded-3xl shadow-sm p-6 mb-6">

    <form method="GET" action="/dokter/data_pasien">

        <div class="flex gap-3">

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                placeholder="Cari pasien..."
                class="flex-1 border rounded-2xl px-5 py-3">

            <button
                class="bg-blue-600 text-white px-6 rounded-2xl">

                Cari

            </button>

        </div>

    </form>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">

        <h2 class="font-bold">
            Daftar Pasien
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="p-5 text-left">
                        No RM
                    </th>

                    <th class="p-5 text-left">
                        Nama
                    </th>

                    <th class="p-5 text-left">
                        NIK
                    </th>

                    <th class="p-5 text-left">
                        No HP
                    </th>

                    <th class="p-5 text-left">
                        Jenis Kelamin
                    </th>

                    <th class="p-5 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr class="border-t hover:bg-slate-50">

                    <td class="p-5">

                        RM<?php echo e(str_pad($item->id,4,'0',STR_PAD_LEFT)); ?>


                    </td>

                    <td class="p-5 font-medium">

                        <?php echo e($item->name); ?>


                    </td>

                    <td class="p-5">

                        <?php echo e($item->nik ?? '-'); ?>


                    </td>

                    <td class="p-5">

                        <?php echo e($item->no_hp ?? '-'); ?>


                    </td>

                    <td class="p-5">

                        <?php echo e($item->jenis_kelamin ?? '-'); ?>


                    </td>

                    <td class="p-5">

                        <div class="flex gap-2">

                            <button
                                onclick="openPatientModal(
                                '<?php echo e($item->name); ?>',
                                '<?php echo e($item->nik ?? '-'); ?>',
                                '<?php echo e($item->no_hp ?? '-'); ?>',
                                '<?php echo e($item->jenis_kelamin ?? '-'); ?>',
                                '<?php echo e($item->alamat ?? '-'); ?>'
                                )"
                                class="bg-blue-600 text-white px-4 py-2 rounded-xl">

                                Detail

                            </button>

                        </div>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="6" class="p-10 text-center text-slate-500">

                        Data pasien tidak ditemukan

                    </td>

                </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL -->
<div
    id="patientModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <div
        class="bg-white rounded-3xl w-full max-w-2xl overflow-hidden">

        <div
            class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 text-white">

            <div class="flex justify-between items-center">

                <h2 class="font-bold text-xl">

                    Detail Pasien

                </h2>

                <button onclick="closePatientModal()">

                    ✕

                </button>

            </div>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="text-sm text-slate-500">
                        Nama
                    </label>

                    <p id="detailNama" class="font-semibold"></p>

                </div>

                <div>

                    <label class="text-sm text-slate-500">
                        NIK
                    </label>

                    <p id="detailNik" class="font-semibold"></p>

                </div>

                <div>

                    <label class="text-sm text-slate-500">
                        No HP
                    </label>

                    <p id="detailHp" class="font-semibold"></p>

                </div>

                <div>

                    <label class="text-sm text-slate-500">
                        Jenis Kelamin
                    </label>

                    <p id="detailJk" class="font-semibold"></p>

                </div>

            </div>

            <div class="mt-5">

                <label class="text-sm text-slate-500">
                    Alamat
                </label>

                <p id="detailAlamat" class="font-semibold"></p>

            </div>

        </div>

    </div>

</div>

<script>

function openPatientModal(
    nama,
    nik,
    hp,
    jk,
    alamat
){

    document.getElementById('patientModal')
        .classList.remove('hidden');

    document.getElementById('detailNama')
        .innerText = nama;

    document.getElementById('detailNik')
        .innerText = nik;

    document.getElementById('detailHp')
        .innerText = hp;

    document.getElementById('detailJk')
        .innerText = jk;

    document.getElementById('detailAlamat')
        .innerText = alamat;
}

function closePatientModal(){

    document.getElementById('patientModal')
        .classList.add('hidden');
}

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/data_pasien.blade.php ENDPATH**/ ?>