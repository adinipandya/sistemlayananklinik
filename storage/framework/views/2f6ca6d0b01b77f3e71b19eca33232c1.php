<?php $__env->startSection('content'); ?>

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

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
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Total Pasien
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    <?php echo e($totalPasien); ?>

                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i data-feather="users" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Pasien Hari Ini
                </p>

                <h2 class="text-4xl font-bold mt-2 text-blue-600">
                    <?php echo e($pasienHariIni); ?>

                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center">

                <i data-feather="user-check" class="text-cyan-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl p-6 shadow-sm">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Kunjungan Bulan Ini
                </p>

                <h2 class="text-4xl font-bold mt-2 text-purple-600">
                    <?php echo e($kunjunganBulanIni); ?>

                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center">

                <i data-feather="bar-chart-2" class="text-purple-600"></i>

            </div>

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm p-6 h-[600px] flex flex-col">

    <div class="flex items-center justify-between mb-6">

        <h2 class="text-xl font-bold text-slate-800">
            Daftar Pasien
        </h2>

        <form method="GET" action="/dokter/data_pasien">

            <div class="relative">

                <input
                    type="text"
                    name="search"
                    value="<?php echo e(request('search')); ?>"
                    placeholder="Cari nama atau NIK..."
                    class="w-80 border rounded-2xl py-3 pl-5 pr-12
                           focus:outline-none focus:ring-2
                           focus:ring-blue-500">

                <button
                    type="submit"
                    class="absolute right-4 top-1/2
                           -translate-y-1/2
                           text-slate-500 hover:text-blue-600">

                    <i data-feather="search"
                        class="w-5 h-5"></i>

                </button>

            </div>

        </form>

    </div>

    <?php if(request('search')): ?>

    <div class="flex-1 overflow-y-auto pr-2">

        <div class="grid gap-4">

            <?php $__empty_1 = true; $__currentLoopData = $pasien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <div class="border rounded-2xl p-5 flex justify-between items-center hover:border-blue-500 transition">

                <div>

                    <p class="text-sm text-slate-500">
                        No Rekam Medis
                    </p>

                    <p class="font-bold text-blue-600">
                        <?php echo e($item->no_rm ?? '-'); ?>

                    </p>

                    <h3 class="text-lg font-semibold mt-2">
                        <?php echo e($item->name); ?>

                    </h3>

                    <p class="text-sm text-slate-500">
                        Status :
                        <span class="text-green-600 font-medium">
                            <?php echo e($item->status); ?>

                        </span>
                    </p>

                </div>

                <button
                    onclick="openPatientModal(
                    '<?php echo e($item->no_rm ?? '-'); ?>',
                    '<?php echo e($item->name); ?>',
                    '<?php echo e($item->nik ?? '-'); ?>',
                    '<?php echo e($item->email ?? '-'); ?>',
                    '<?php echo e($item->no_hp ?? '-'); ?>',
                    '<?php echo e($item->jenis_kelamin ?? '-'); ?>',
                    '<?php echo e($item->tanggal_lahir ?? '-'); ?>',
                    '<?php echo e($item->alamat ?? '-'); ?>',
                    '<?php echo e($item->golongan_darah ?? '-'); ?>',
                    '<?php echo e($item->diagnosa_terakhir ?? '-'); ?>'
                    )"
                    class="border border-blue-600 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-50">

                    Detail Pasien

                </button>

            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="text-center py-10 text-slate-500">
                Data pasien tidak ditemukan
            </div>

            <?php endif; ?>

        </div>

    </div>

    <?php else: ?>

    <div class="flex-1 flex flex-col items-center justify-center">

        <svg class="w-14 h-14 mx-auto text-slate-300 mb-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.5"
                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />

        </svg>

        <p class="text-slate-500">
            Cari pasien berdasarkan nama atau NIK
        </p>

    </div>

    <?php endif; ?>

</div>

<!-- MODAL DETAIL PASIEN -->
<div
    id="patientModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <div class="bg-white rounded-3xl w-full max-w-3xl overflow-hidden">

        <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">

            <div class="flex justify-between items-center">

                <div>
                    <h2 class="text-2xl font-bold">
                        Detail Pasien
                    </h2>

                    <p class="text-blue-100 mt-1">
                        Informasi Lengkap Pasien
                    </p>
                </div>

                <button
                    onclick="closePatientModal()"
                    class="text-2xl">

                    ×

                </button>

            </div>

        </div>

        <div class="p-6">

            <!-- IDENTITAS -->
            <h3 class="font-bold text-slate-700 mb-4">
                Identitas Pasien
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">No Rekam Medis</p>
                    <p id="detailRm" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Nama Lengkap</p>
                    <p id="detailNama" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">NIK</p>
                    <p id="detailNik" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Jenis Kelamin</p>
                    <p id="detailJk" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Lahir</p>
                    <p id="detailTglLahir" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Alamat</p>
                    <p id="detailAlamat" class="font-semibold"></p>
                </div>

            </div>

            <hr class="my-6">

            <!-- KONTAK -->
            <h3 class="font-bold text-slate-700 mb-4">
                Informasi Kontak
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">Email</p>
                    <p id="detailEmail" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">No HP</p>
                    <p id="detailHp" class="font-semibold"></p>
                </div>

            </div>

            <hr class="my-6">

            <!-- INFORMASI MEDIS -->
            <h3 class="font-bold text-slate-700 mb-4">
                Informasi Medis
            </h3>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">Golongan Darah</p>
                    <p id="detailGoldar" class="font-semibold"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Diagnosa Terakhir</p>
                    <p id="detailDiagnosa" class="font-semibold">
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function openPatientModal(
        rm,
        nama,
        nik,
        email,
        hp,
        jk,
        tglLahir,
        alamat,
        goldar,
        diagnosa
    ) {

        document.getElementById('patientModal')
            .classList.remove('hidden');

        document.getElementById('detailRm').innerText = rm;
        document.getElementById('detailNama').innerText = nama;
        document.getElementById('detailNik').innerText = nik;
        document.getElementById('detailEmail').innerText = email;
        document.getElementById('detailHp').innerText = hp;
        document.getElementById('detailJk').innerText = jk;
        document.getElementById('detailTglLahir').innerText = tglLahir;
        document.getElementById('detailAlamat').innerText = alamat;
        document.getElementById('detailGoldar').innerText = goldar;
        document.getElementById('detailDiagnosa').innerText = diagnosa;
    }

    function closePatientModal() {
        document.getElementById('patientModal')
            .classList.add('hidden');
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/data_pasien.blade.php ENDPATH**/ ?>