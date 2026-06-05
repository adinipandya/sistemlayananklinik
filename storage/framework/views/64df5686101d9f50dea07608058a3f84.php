<?php $__env->startSection('content'); ?>

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Rekam Medis
    </h1>

    <p class="text-slate-500 mt-1">
        Data rekam medis pasien yang telah ditangani
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Rekam Medis
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            25
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Selesai
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            20
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Menunggu
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            5
        </h2>

    </div>

</div>

<!-- TABEL -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">

    <div class="p-5 border-b">

        <h2 class="font-semibold text-slate-700">
            Daftar Rekam Medis
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left p-5">
                    Nama
                </th>

                <th class="text-left p-5">
                    Tanggal
                </th>

                <th class="text-left p-5">
                    Diagnosa
                </th>

                <th class="text-left p-5">
                    Status
                </th>

                <th class="text-left p-5">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <tr class="border-t">

                <td class="p-5">
                    Ardi
                </td>

                <td class="p-5">
                    20 Apr 2026
                </td>

                <td class="p-5">
                    Flu & Batuk
                </td>

                <td class="p-5">

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Selesai
                    </span>

                </td>

                <td class="p-5">

                    <a href="/dokter/rekam-medis/detail"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                        Detail

                    </a>

                </td>

            </tr>

            <tr class="border-t">

                <td class="p-5">
                    Ihsan
                </td>

                <td class="p-5">
                    25 Apr 2026
                </td>

                <td class="p-5">
                    -
                </td>

                <td class="p-5">

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Menunggu
                    </span>

                </td>

                <td class="p-5">

                    <button class="bg-slate-300 text-slate-600 px-4 py-2 rounded-lg cursor-not-allowed">

                        Belum Ada

                    </button>

                </td>

            </tr>

        </tbody>

    </table>

</div>

<!-- MODAL DETAIL REKAM MEDIS -->
<div id="detailModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-5">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="border-b px-6 py-4">

            <h2 class="text-xl font-semibold text-slate-800">
                Detail Rekam Medis
            </h2>

            <p class="text-sm text-slate-500">
                Informasi hasil pemeriksaan pasien
            </p>

        </div>

        <!-- VIEW MODE -->
        <div id="viewMode" class="p-6">

            <!-- IDENTITAS -->
            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">Nama Pasien</p>
                    <p class="font-medium">Ihsan</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">No Rekam Medis</p>
                    <p class="font-medium">RM001</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Umur</p>
                    <p class="font-medium">21 Tahun</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Jenis Kelamin</p>
                    <p class="font-medium">Laki-Laki</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Dokter Pemeriksa</p>
                    <p class="font-medium">Dr. Ardi</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Pemeriksaan</p>
                    <p class="font-medium">20 April 2026</p>
                </div>

            </div>

            <!-- KELUHAN -->
            <div class="mt-6">
                <p class="text-sm font-medium text-slate-500 mb-2">
                    Keluhan Utama
                </p>

                <div class="bg-slate-50 border rounded-lg p-4">
                    Demam tinggi, batuk dan pilek selama 3 hari.
                </div>
            </div>

            <!-- PEMERIKSAAN -->
            <div class="mt-6">

                <p class="text-sm font-medium text-slate-500 mb-3">
                    Pemeriksaan Fisik
                </p>

                <div class="grid md:grid-cols-4 gap-3">

                    <div class="bg-slate-50 border rounded-lg p-3">
                        <p class="text-xs text-slate-500">Tekanan Darah</p>
                        <p class="font-semibold">120/80</p>
                    </div>

                    <div class="bg-slate-50 border rounded-lg p-3">
                        <p class="text-xs text-slate-500">Suhu</p>
                        <p class="font-semibold">38.2 °C</p>
                    </div>

                    <div class="bg-slate-50 border rounded-lg p-3">
                        <p class="text-xs text-slate-500">BB</p>
                        <p class="font-semibold">65 Kg</p>
                    </div>

                    <div class="bg-slate-50 border rounded-lg p-3">
                        <p class="text-xs text-slate-500">TB</p>
                        <p class="font-semibold">170 Cm</p>
                    </div>

                </div>

            </div>

            <!-- DIAGNOSIS -->
            <div class="mt-6">

                <p class="text-sm font-medium text-slate-500 mb-2">
                    Diagnosis
                </p>

                <div class="bg-slate-50 border rounded-lg p-4">
                    Influenza ringan (ISPA ringan).
                </div>

            </div>

            <!-- TINDAKAN -->
            <div class="mt-6">

                <p class="text-sm font-medium text-slate-500 mb-2">
                    Tindakan Medis
                </p>

                <div class="bg-slate-50 border rounded-lg p-4">
                    Edukasi pasien, istirahat cukup, dan observasi kondisi selama 3 hari.
                </div>

            </div>

            <!-- RESEP -->
            <div class="mt-6">

                <p class="text-sm font-medium text-slate-500 mb-2">
                    Resep Obat
                </p>

                <div class="overflow-hidden border rounded-lg">

                    <table class="w-full">

                        <thead class="bg-slate-100">

                            <tr>
                                <th class="p-3 text-left">Obat</th>
                                <th class="p-3 text-left">Dosis</th>
                                <th class="p-3 text-left">Aturan Pakai</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr class="border-t">
                                <td class="p-3">Paracetamol</td>
                                <td class="p-3">500mg</td>
                                <td class="p-3">3x1</td>
                            </tr>

                            <tr class="border-t">
                                <td class="p-3">Vitamin C</td>
                                <td class="p-3">500mg</td>
                                <td class="p-3">1x1</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- CATATAN -->
            <div class="mt-6">

                <p class="text-sm font-medium text-slate-500 mb-2">
                    Catatan Dokter
                </p>

                <div class="bg-slate-50 border rounded-lg p-4">
                    Kontrol kembali dalam 3 hari apabila demam tidak membaik.
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 mt-8">

                <button onclick="enableEdit()"
                    class="flex-1 bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600">

                    Edit Data

                </button>

                <button onclick="openDeleteModal()"
                    class="flex-1 bg-red-500 text-white py-3 rounded-lg hover:bg-red-600">

                    Hapus Data

                </button>

                <button class="flex-1 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">

                    Cetak PDF

                </button>

                <button onclick="closeDetailModal()"
                    class="flex-1 border border-slate-300 py-3 rounded-lg hover:bg-slate-50">

                    Tutup

                </button>

            </div>

        </div>

        <!-- MODAL DELETE -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

            <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-sm text-center">

                <h2 class="text-lg font-bold mb-4">Yakin hapus data?</h2>
                <p class="text-gray-500 mb-6">Data tidak bisa dikembalikan</p>

                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()" class="w-full bg-gray-300 py-2 rounded-lg">
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

        <!-- EDIT MODE -->
        <form id="editMode" class="hidden p-6" action="<?php echo e(route('rekam_medis.update', 1)); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="block text-sm text-slate-600 mb-2">
                        Nama Pasien
                    </label>

                    <input type="text" name="nama" value="Ihsan" class="w-full border border-slate-300 rounded-lg p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-600 mb-2">
                        Tanggal Pemeriksaan
                    </label>

                    <input type="date" name="tanggal" value="2026-04-20"
                        class="w-full border border-slate-300 rounded-lg p-3">

                </div>

            </div>

            <div class="mt-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Keluhan
                </label>

                <textarea name="keluhan" rows="3"
                    class="w-full border border-slate-300 rounded-lg p-3">Demam dan batuk selama 3 hari.</textarea>

            </div>

            <div class="mt-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Diagnosis
                </label>

                <textarea name="diagnosa" rows="3"
                    class="w-full border border-slate-300 rounded-lg p-3">Influenza ringan.</textarea>

            </div>

            <div class="mt-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Resep Obat
                </label>

                <textarea name="resep" rows="3"
                    class="w-full border border-slate-300 rounded-lg p-3">Paracetamol 500mg, Vitamin C.</textarea>

            </div>

            <div class="flex gap-3 mt-6">

                <button type="submit" class="flex-1 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">

                    Simpan Perubahan

                </button>

                <button type="button" onclick="cancelEdit()"
                    class="flex-1 border border-slate-300 py-3 rounded-lg hover:bg-slate-50">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openDetailModal() {
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');

        document.getElementById('viewMode').classList.remove('hidden');
        document.getElementById('editMode').classList.add('hidden');
    }

    function enableEdit() {
        document.getElementById('viewMode').classList.add('hidden');
        document.getElementById('editMode').classList.remove('hidden');
    }

    function cancelEdit() {
        document.getElementById('editMode').classList.add('hidden');
        document.getElementById('viewMode').classList.remove('hidden');
    }

    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/kelola_rekam.blade.php ENDPATH**/ ?>