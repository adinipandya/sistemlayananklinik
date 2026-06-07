<?php $__env->startSection('content'); ?>

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Kelola Dokter
    </h1>

    <p class="text-slate-500 mt-1">
        Tambah, edit dan kelola data dokter Klinik Polibatam.
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Dokter
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?php echo e($dokter->count()); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Dokter Umum
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            <?php echo e($dokter->where('spesialis', 'Umum')->count()); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Dokter Gigi
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            <?php echo e($dokter->where('spesialis', 'Gigi')->count()); ?>

        </h2>

    </div>

</div>

<!-- SEARCH + BUTTON -->
<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">

    <input type="text" id="searchDokter" placeholder="Cari dokter..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">

    <button onclick="openTambahModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl flex items-center gap-2">

        <i class="bi bi-plus-lg"></i>

        Tambah Dokter

    </button>

</div>

<!-- CARD DOKTER -->

<div id="dokterContainer" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    <?php $__empty_1 = true; $__currentLoopData = $dokter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div
        class="dokter-card bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">

        <!-- HEADER CARD -->
        <div class="flex justify-between items-start mb-4">

            <div>

                <h3 class="text-xl font-semibold text-slate-800">
                    <?php echo e($item->nama); ?>

                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    SIP: <?php echo e($item->sip); ?>

                </p>

            </div>

            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">
                Aktif
            </span>

        </div>

        <!-- SPESIALIS -->
        <div class="mb-4">

            <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-lg text-sm">

                <?php echo e($item->spesialis); ?>


            </span>

        </div>

        <!-- INFO -->
        <div class="space-y-3 text-sm">

            <div class="flex items-center gap-3">

                <i class="bi bi-telephone text-slate-500"></i>

                <span><?php echo e($item->no_hp); ?></span>

            </div>

            <div class="flex items-center gap-3">

                <i class="bi bi-envelope text-slate-500"></i>

                <span><?php echo e($item->email); ?></span>

            </div>

        </div>

        <!-- AKSI -->
        <div class="flex gap-2 mt-6">

            <button onclick="openEditModal(
                '<?php echo e($item->id); ?>',
                '<?php echo e($item->nama); ?>',
                '<?php echo e($item->spesialis); ?>',
                '<?php echo e($item->no_hp); ?>'
                )" class="flex-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 py-2 rounded-xl">

                <i class="bi bi-pencil-square"></i>
                Edit

            </button>

            <form action="/admin/dokter/<?php echo e($item->id); ?>" method="POST" class="flex-1">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button onclick="return confirm('Yakin hapus dokter?')"
                    class="w-full bg-red-100 hover:bg-red-200 text-red-700 py-2 rounded-xl">

                    <i class="bi bi-trash"></i>
                    Hapus

                </button>

            </form>

        </div>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="col-span-full bg-white rounded-xl border p-10 text-center text-slate-500">

        Belum ada data dokter.

    </div>

    <?php endif; ?>

</div>

<!-- MODAL TAMBAH -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">
            Tambah Dokter
        </h2>

        <form action="/admin/dokter" method="POST">

            <?php echo csrf_field(); ?>

            <input type="text" name="nama" placeholder="Nama Dokter" class="w-full border rounded-lg p-3 mb-3">

            <input type="text" name="sip" placeholder="Nomor SIP" class="w-full border rounded-lg p-3 mb-3">

            <select name="spesialis" class="w-full border rounded-lg p-3 mb-3">

                <option>Umum</option>
                <option>Gigi</option>

            </select>

            <input type="text" name="no_hp" placeholder="Nomor HP" class="w-full border rounded-lg p-3 mb-3">

            <input type="email" name="email" placeholder="Email" class="w-full border rounded-lg p-3 mb-3">


            <div class="flex gap-3">

                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Simpan

                </button>

                <button type="button" onclick="closeTambahModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<!-- MODAL EDIT -->
<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">
            Edit Dokter
        </h2>

        <form id="editForm" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input id="editNama" type="text" name="nama" class="w-full border rounded-lg p-3 mb-3">

            <select id="editSpesialis" name="spesialis" class="w-full border rounded-lg p-3 mb-3">

                <option>Umum</option>
                <option>Gigi</option>

            </select>

            <input id="editNoHp" type="text" name="no_hp" class="w-full border rounded-lg p-3 mb-4">

            <div class="flex gap-3">

                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Update

                </button>

                <button type="button" onclick="closeEditModal()" class="flex-1 bg-slate-500 text-white py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openTambahModal() {
        document
            .getElementById('tambahModal')
            .classList.remove('hidden');
    }

    function closeTambahModal() {
        document
            .getElementById('tambahModal')
            .classList.add('hidden');
    }

    function openEditModal(id, nama, spesialis, nohp) {
        document
            .getElementById('editForm')
            .action =
            '/admin/dokter/' + id;

        document
            .getElementById('editNama')
            .value = nama;

        document
            .getElementById('editSpesialis')
            .value = spesialis;

        document
            .getElementById('editNoHp')
            .value = nohp;

        document
            .getElementById('editModal')
            .classList.remove('hidden');
    }

    function closeEditModal() {
        document
            .getElementById('editModal')
            .classList.add('hidden');
    }
    document
        .getElementById('searchDokter')
        .addEventListener('keyup', function () {

            let value = this.value.toLowerCase();

            document
                .getElementById('searchDokter')
                .addEventListener('keyup', function () {

                    let value = this.value.toLowerCase();

                    let cards = document.querySelectorAll('.dokter-card');

                    cards.forEach(card => {

                        let text = card.innerText.toLowerCase();

                        card.style.display =
                            text.includes(value) ?
                            '' :
                            'none';

                    });

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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/admin/dokter_admin.blade.php ENDPATH**/ ?>