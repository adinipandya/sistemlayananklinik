<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Rekam Medis 📄
</h1>

<!-- LIST CARD -->
<div class="grid md:grid-cols-2 gap-6">

    <!-- CARD 1 -->
<div data-aos="fade-up"
class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">

    <div class="flex justify-between items-center mb-3">
        <h3 class="font-bold text-lg">Dr. Ardi</h3>
        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Selesai
        </span>
    </div>

    <p class="text-gray-500 mb-2">📅 2026-04-20</p>
    <p class="text-gray-600 mb-4">Diagnosa: Flu & Batuk</p>

    <button onclick="openDetailModal()"
    class="text-blue-500 hover:underline">
        Lihat Detail
    </button>
</div>

    <!-- CARD 2 -->
    <div data-aos="fade-up" data-aos-delay="150"
    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-bold text-lg">Dr. Ihsan</h3>
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                Menunggu
            </span>
        </div>

        <p class="text-gray-500 mb-2">📅 2026-04-25</p>
        <p class="text-gray-600 mb-4">Diagnosa: -</p>

        <button class="text-gray-400 cursor-not-allowed">
            Belum tersedia
        </button>
    </div>

</div>

        <!-- MODAL DETAIL -->
<div id="detailModal"
    class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">

        <h2 class="text-xl font-bold mb-4">Detail Rekam Medis</h2>

        <!-- VIEW MODE -->
        <div id="viewMode" class="space-y-2 text-gray-600">
            <p><b>Dokter:</b> Dr. Ardi</p>
            <p><b>Tanggal:</b> 2026-04-20</p>
            <p><b>Diagnosa:</b> Flu & Batuk</p>
            <p><b>Resep:</b> Paracetamol, Vitamin C</p>
        </div>

        <!-- EDIT MODE -->
        <form id="editMode" class="hidden space-y-3 mt-3"
        action="<?php echo e(route('rekam_medis.update', 1)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <input type="text" name="dokter" value="Dr. Ardi"
            class="w-full border p-2 rounded">

            <input type="date" name="tanggal" value="2026-04-20"
            class="w-full border p-2 rounded">

            <input type="text" name="diagnosa" value="Flu & Batuk"
            class="w-full border p-2 rounded">

            <input type="text" name="resep" value="Paracetamol"
            class="w-full border p-2 rounded">

    <!-- BUTTON -->
    <div class="flex gap-3">
        <button type="submit"
        class="w-full bg-green-500 text-white py-2 rounded-lg">
            Simpan
        </button>

        <button type="button" onclick="cancelEdit()"
        class="w-full bg-gray-400 text-white py-2 rounded-lg">
            Batal
        </button>
    </div>
</form>
        <!-- ACTION BUTTON -->
        <div class="flex justify-between mt-6">

            <button onclick="enableEdit()"
            class="text-yellow-500 hover:underline">
                Edit
            </button>

            <button onclick="openDeleteModal()"
            class="text-red-500 hover:underline">
                Hapus
            </button>

        </div>

        <button onclick="closeDetailModal()"
        class="mt-4 w-full bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg">
            Tutup
        </button>

    </div>
</div>

<!-- MODAL DELETE -->
<div id="deleteModal"
class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-sm text-center">

        <h2 class="text-lg font-bold mb-4">Yakin hapus data?</h2>
        <p class="text-gray-500 mb-6">Data tidak bisa dikembalikan</p>

        <div class="flex gap-3">
            <button onclick="closeDeleteModal()"
            class="w-full bg-gray-300 py-2 rounded-lg">
                Batal
            </button>

            <form action="<?php echo e(route('rekam_medis.destroy', 1)); ?>" method="POST" class="w-full">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="w-full bg-red-500 text-white py-2 rounded-lg">
                    Hapus
                </button>
            </form>
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

// EDIT MODE
function enableEdit() {
    document.getElementById('viewMode').classList.add('hidden');
    document.getElementById('editMode').classList.remove('hidden');
}

function cancelEdit() {
    document.getElementById('editMode').classList.add('hidden');
    document.getElementById('viewMode').classList.remove('hidden');
}

// DELETE MODAL
function openDeleteModal() {
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/kelola_rekam.blade.php ENDPATH**/ ?>