<?php $__env->startSection('content'); ?>

<!-- HEADER -->

<div class="mb-8">


    <h1 class="text-3xl font-bold text-slate-800">
        Kelola Obat
    </h1>

    <p class="text-slate-500 mt-1">
        Kelola stok dan data obat Klinik Polibatam.
    </p>


</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-4 gap-5 mb-8">


    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-capsule text-blue-500"></i>

            <span class="text-sm text-slate-500">
                Total Obat
            </span>

        </div>

        <h2 class="text-4xl font-bold text-slate-800 mt-3">
            <?php echo e($totalObat); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-check-circle text-green-500"></i>

            <span class="text-sm text-slate-500">
                Stok Aman
            </span>

        </div>

        <h2 class="text-4xl font-bold text-green-600 mt-3">
            <?php echo e($stokAman); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-exclamation-circle text-yellow-500"></i>

            <span class="text-sm text-slate-500">
                Stok Menipis
            </span>

        </div>

        <h2 class="text-4xl font-bold text-yellow-500 mt-3">
            <?php echo e($stokMenipis); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-x-circle text-red-500"></i>

            <span class="text-sm text-slate-500">
                Stok Habis
            </span>

        </div>

        <h2 class="text-4xl font-bold text-red-500 mt-3">
            <?php echo e($stokHabis); ?>

        </h2>

    </div>


</div>

<!-- SEARCH + BUTTON -->

<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">


    <input type="text" id="searchObat" placeholder="Cari nama obat..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">

    <button onclick="openTambahModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl flex items-center gap-2">

        <i class="bi bi-plus-lg"></i>

        Tambah Obat

    </button>


</div>

<div id="obatContainer" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    <?php $__empty_1 = true; $__currentLoopData = $obat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="obat-card bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition">

        <div class="flex justify-between items-start">

            <div>

                <h3 class="text-xl font-semibold text-slate-800">
                    <?php echo e($item->nama_obat); ?>

                </h3>

                <p class="text-slate-500 text-sm mt-1">
                    <?php echo e($item->jenis_obat); ?>

                </p>

            </div>

            <?php if($item->stok > 20): ?>

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                Aman
            </span>

            <?php elseif($item->stok > 0): ?>

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                Menipis
            </span>

            <?php else: ?>

            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                Habis
            </span>

            <?php endif; ?>

        </div>

        <div class="mt-6">

            <div class="flex justify-between text-sm mb-2">

                <span>Stok</span>

                <span class="font-semibold">
                    <?php echo e($item->stok); ?>

                </span>

            </div>

        </div>

        <div class="mt-5">

            <p class="text-slate-500 text-sm">
                Harga
            </p>

            <h4 class="text-lg font-bold text-slate-800">
                Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?>

            </h4>

        </div>

        <div class="mt-3">

            <p class="text-slate-500 text-sm">
                <?php echo e($item->deskripsi); ?>

            </p>

        </div>

        <div class="flex gap-2 mt-6">

            <button onclick="openEditModal(
        '<?php echo e($item->id); ?>',
        '<?php echo e($item->nama_obat); ?>',
        '<?php echo e($item->jenis_obat); ?>',
        '<?php echo e($item->stok); ?>',
        '<?php echo e($item->harga); ?>',
        '<?php echo e($item->deskripsi); ?>'
    )" class="flex-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 py-2 rounded-xl">

                <i class="bi bi-pencil-square"></i>
                Edit

            </button>

            <form action="<?php echo e(route('obat.destroy', $item->id)); ?>" method="POST" class="flex-1">

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="submit" onclick="return confirm('Yakin ingin menghapus obat ini?')"
                    class="w-full bg-red-100 hover:bg-red-200 text-red-700 py-2 rounded-xl">

                    <i class="bi bi-trash"></i>
                    Hapus

                </button>

            </form>

        </div>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="col-span-3 text-center py-10">

        <p class="text-slate-500">
            Belum ada data obat.
        </p>

    </div>

    <?php endif; ?>

</div>

<!-- MODAL TAMBAH -->

<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">

            <i class="bi bi-capsule-pill mr-2"></i>

            Tambah Obat

        </h2>

        <form action="<?php echo e(route('obat.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <input type="text" name="nama_obat" placeholder="Nama Obat" class="w-full border rounded-lg p-3 mb-3">

            <input type="text" name="jenis_obat" placeholder="Jenis Obat" class="w-full border rounded-lg p-3 mb-3">

            <input type="number" name="stok" placeholder="Stok" class="w-full border rounded-lg p-3 mb-3">

            <input type="number" name="harga" placeholder="Harga" class="w-full border rounded-lg p-3 mb-3">

            <textarea name="deskripsi" placeholder="Deskripsi Obat"
                class="w-full border rounded-lg p-3 mb-4"></textarea>

            <div class="flex gap-3">

                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Tambah

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
<div id="editModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">
            Edit Obat
        </h2>

        <form id="editForm" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input
                id="editNama"
                type="text"
                name="nama_obat"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editJenis"
                type="text"
                name="jenis_obat"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editStok"
                type="number"
                name="stok"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editHarga"
                type="number"
                name="harga"
                class="w-full border rounded-lg p-3 mb-3">

            <textarea
                id="editDeskripsi"
                name="deskripsi"
                class="w-full border rounded-lg p-3 mb-4"></textarea>

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="flex-1 bg-yellow-500 text-white py-3 rounded-lg">

                    Simpan Perubahan

                </button>

                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">

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

    function openEditModal(
    id,
    nama,
    jenis,
    stok,
    harga,
    deskripsi
)
{
    document
        .getElementById('editModal')
        .classList.remove('hidden');

    document
        .getElementById('editForm')
        .action =
        '/admin/obat/' + id;

    document
        .getElementById('editNama')
        .value = nama;

    document
        .getElementById('editJenis')
        .value = jenis;

    document
        .getElementById('editStok')
        .value = stok;

    document
        .getElementById('editHarga')
        .value = harga;

    document
        .getElementById('editDeskripsi')
        .value = deskripsi;
}

function closeEditModal()
{
    document
        .getElementById('editModal')
        .classList.add('hidden');
}

    function closeTambahModal() {

        document
            .getElementById('tambahModal')
            .classList.add('hidden');

    }

    document
        .getElementById('searchObat')
        .addEventListener('keyup', function () {

            let value = this.value.toLowerCase();

            let cards = document.querySelectorAll('.obat-card');

            cards.forEach(card => {

                let text = card.innerText.toLowerCase();

                card.style.display =
                    text.includes(value) ?
                    '' :
                    'none';

            });

        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/obat_admin.blade.php ENDPATH**/ ?>