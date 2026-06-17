<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Kelola Resep Obat
    </h1>

    <p class="text-slate-500 mt-1">
        Kelola resep obat pasien yang telah melakukan konsultasi.
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-file-medical text-blue-500"></i>

            <span class="text-sm text-slate-500">
                Total Resep
            </span>

        </div>

        <h2 class="text-4xl font-bold text-slate-800 mt-3">
            20
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-calendar-day text-green-500"></i>

            <span class="text-sm text-slate-500">
                Hari Ini
            </span>

        </div>

        <h2 class="text-4xl font-bold text-green-600 mt-3">
            5
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-hourglass-split text-yellow-500"></i>

            <span class="text-sm text-slate-500">
                Belum Ditebus
            </span>

        </div>

        <h2 class="text-4xl font-bold text-yellow-500 mt-3">
            3
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-check-circle text-green-600"></i>

            <span class="text-sm text-slate-500">
                Sudah Ditebus
            </span>

        </div>

        <h2 class="text-4xl font-bold text-green-600 mt-3">
            17
        </h2>

    </div>

</div>

<!-- SEARCH  -->
<div class="mb-6">

    <input type="text" id="searchResep" placeholder="Cari pasien..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">

</div>

<!-- RESEP CARD -->

<div id="resepContainer" class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- RESEP 1 -->
    <div
        class="resep-card bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">

        <div class="bg-blue-50 border-b border-slate-200 px-6 py-4">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-semibold text-lg text-slate-800">
                        Ihsan
                    </h3>

                    <p class="text-sm text-slate-500">
                        10 Juni 2026
                    </p>

                </div>

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

                    Belum Ditebus

                </span>

            </div>

        </div>

        <div class="p-6">

            <div class="mb-4">

                <p class="text-sm text-slate-500 mb-1">

                    Diagnosa

                </p>

                <p class="font-medium">

                    Demam

                </p>

            </div>

            <div>

                <p class="text-sm text-slate-500 mb-2">

                    Resep Obat

                </p>

                <ul class="space-y-2">

                    <li class="bg-slate-50 rounded-lg px-3 py-2">

                        Paracetamol 3x1

                    </li>

                    <li class="bg-slate-50 rounded-lg px-3 py-2">

                        Vitamin C 1x1

                    </li>

                </ul>

            </div>

            <div class="flex gap-2 mt-6">

                <button class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 rounded-xl">

                    <i class="bi bi-eye"></i>

                    Detail

                </button>

                <button class="flex-1 bg-red-100 hover:bg-red-200 text-red-700 py-2 rounded-xl">

                    <i class="bi bi-trash"></i>

                    Hapus

                </button>

            </div>

        </div>

    </div>

    <!-- RESEP 2 -->

    <div
        class="resep-card bg-white border border-slate-200 rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">

        <div class="bg-green-50 border-b border-slate-200 px-6 py-4">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-semibold text-lg text-slate-800">
                        Ardi
                    </h3>

                    <p class="text-sm text-slate-500">
                        10 Juni 2026
                    </p>

                </div>

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

                    Sudah Ditebus

                </span>

            </div>

        </div>

        <div class="p-6">

            <div class="mb-4">

                <p class="text-sm text-slate-500 mb-1">

                    Diagnosa

                </p>

                <p class="font-medium">

                    Infeksi

                </p>

            </div>

            <div>

                <p class="text-sm text-slate-500 mb-2">

                    Resep Obat

                </p>

                <ul class="space-y-2">

                    <li class="bg-slate-50 rounded-lg px-3 py-2">

                        Amoxicillin 2x1

                    </li>

                    <li class="bg-slate-50 rounded-lg px-3 py-2">

                        Vitamin B Complex 1x1

                    </li>

                </ul>

            </div>

            <div class="flex gap-2 mt-6">

                <button class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-700 py-2 rounded-xl">

                    <i class="bi bi-eye"></i>

                    Detail

                </button>

                <button class="flex-1 bg-red-100 hover:bg-red-200 text-red-700 py-2 rounded-xl">

                    <i class="bi bi-trash"></i>

                    Hapus

                </button>

            </div>

        </div>

    </div>

</div>

<script>
    document
        .getElementById('searchResep')
        .addEventListener('keyup', function () {

            let value = this.value.toLowerCase();

            let cards = document.querySelectorAll('.resep-card');

            cards.forEach(card => {

                let text = card.innerText.toLowerCase();

                card.style.display =
                    text.includes(value) ?
                    '' :
                    'none';

            });

            rows.forEach(row => {

                let text = row.innerText.toLowerCase();

                row.style.display =
                    text.includes(value) ?
                    '' :
                    'none';

            });

        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/resep_admin.blade.php ENDPATH**/ ?>