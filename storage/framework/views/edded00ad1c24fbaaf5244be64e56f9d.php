<?php $__env->startSection('content'); ?>

<div class="mb-8 flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Detail Rekam Medis
        </h1>

        <p class="text-slate-500 mt-1">
            Informasi lengkap hasil pemeriksaan pasien
        </p>

    </div>

</div>

<!-- IDENTITAS -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold text-lg mb-5">
        Informasi Pasien
    </h2>

    <div class="grid md:grid-cols-3 gap-5">

        <div>
            <p class="text-sm text-slate-500">No RM</p>
            <p class="font-medium">RM001</p>
        </div>

        <div>
            <p class="text-sm text-slate-500">Nama Pasien</p>
            <p class="font-medium">Ihsan</p>
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

</div>

<!-- KELUHAN -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold mb-3">
        Keluhan Utama
    </h2>

    <p>
        Demam tinggi, batuk dan pilek selama 3 hari.
    </p>

</div>

<!-- PEMERIKSAAN -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold mb-4">
        Pemeriksaan Fisik
    </h2>

    <div class="grid md:grid-cols-4 gap-4">

        <div class="bg-slate-50 rounded-lg p-4">

            <p class="text-sm text-slate-500">
                Tekanan Darah
            </p>

            <h3 class="font-bold text-lg">
                120/80
            </h3>

        </div>

        <div class="bg-slate-50 rounded-lg p-4">

            <p class="text-sm text-slate-500">
                Suhu
            </p>

            <h3 class="font-bold text-lg">
                38.2°C
            </h3>

        </div>

        <div class="bg-slate-50 rounded-lg p-4">

            <p class="text-sm text-slate-500">
                Berat Badan
            </p>

            <h3 class="font-bold text-lg">
                65 Kg
            </h3>

        </div>

        <div class="bg-slate-50 rounded-lg p-4">

            <p class="text-sm text-slate-500">
                Tinggi Badan
            </p>

            <h3 class="font-bold text-lg">
                170 Cm
            </h3>

        </div>

    </div>

</div>

<!-- DIAGNOSIS -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold mb-3">
        Diagnosis
    </h2>

    <p>
        Influenza ringan (ISPA ringan).
    </p>

</div>

<!-- TINDAKAN -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold mb-3">
        Tindakan Medis
    </h2>

    <p>
        Edukasi pasien, istirahat cukup dan observasi selama 3 hari.
    </p>

</div>

<!-- RESEP -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-6">

    <h2 class="font-semibold mb-4">
        Resep Obat
    </h2>

    <table class="w-full">

        <thead>

            <tr class="border-b">

                <th class="text-left py-3">
                    Nama Obat
                </th>

                <th class="text-left py-3">
                    Dosis
                </th>

                <th class="text-left py-3">
                    Aturan Pakai
                </th>

            </tr>

        </thead>

        <tbody>

            <tr class="border-b">

                <td class="py-3">
                    Paracetamol
                </td>

                <td>
                    500mg
                </td>

                <td>
                    3x1
                </td>

            </tr>

            <tr>

                <td class="py-3">
                    Vitamin C
                </td>

                <td>
                    500mg
                </td>

                <td>
                    1x1
                </td>

            </tr>

        </tbody>

    </table>

</div>

<!-- CATATAN -->
<div class="bg-white rounded-xl border border-slate-200 p-6 mb-8">

    <h2 class="font-semibold mb-3">
        Catatan Dokter
    </h2>

    <p>
        Kontrol kembali dalam 3 hari apabila demam tidak membaik.
    </p>

</div>

<!-- BUTTON -->
<div class="mt-8 border-t pt-5">

    <div class="flex items-center gap-3">

        <a href="/dokter/rekam-medis/edit" title="Edit Rekam Medis"
            class="w-11 h-11 flex items-center justify-center rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-200">

            <i data-feather="edit-2"></i>

        </a>

        <!-- DELETE -->
        <button onclick="openDeleteModal()" title="Hapus Rekam Medis"
            class="w-11 h-11 flex items-center justify-center rounded-lg bg-red-100 text-red-600 hover:bg-red-200">

            <i data-feather="trash-2"></i>

        </button>

        <!-- PDF -->
        <a href="/dokter/rekam-medis/print" title="Cetak PDF"
            class="w-11 h-11 flex items-center justify-center rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-200">

            <i data-feather="printer"></i>

        </a>

        <!-- KEMBALI -->
        <a href="/dokter/kelola" title="Kembali"
            class="w-11 h-11 flex items-center justify-center rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200">

            <i data-feather="arrow-left"></i>

        </a>

    </div>

    <div id="deleteModal" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

        <div class="bg-white rounded-xl p-6 w-full max-w-sm">

            <h2 class="text-lg font-semibold mb-2">
                Hapus Rekam Medis
            </h2>

            <p class="text-slate-500 mb-6">
                Data yang dihapus tidak dapat dikembalikan.
            </p>

            <div class="flex gap-3">

                <button onclick="closeDeleteModal()" class="flex-1 border rounded-lg py-2">

                    Batal

                </button>

                <form action="<?php echo e(route('rekam_medis.destroy',1)); ?>" method="POST" class="flex-1">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button class="w-full bg-red-500 text-white py-2 rounded-lg">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sistemlayananklinik\resources\views/dokter/detail_rekam.blade.php ENDPATH**/ ?>