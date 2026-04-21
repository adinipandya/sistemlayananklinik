

<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Data Resep Obat 💊
</h1>

<!-- CARD -->
<div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl transition duration-300 animate-fadeInUp">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">No</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Tanggal</th>
                <th>Resep</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <!-- ROW 1 -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">1</td>
                <td>Ihsan</td>
                <td>Dr. Andi</td>
                <td>2026-04-21</td>
                <td>Paracetamol 3x1</td>
                <td class="space-x-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Lihat
                    </button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>
                </td>
            </tr>

            <!-- ROW 2 -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">2</td>
                <td>Dini</td>
                <td>Dr. Budi</td>
                <td>2026-04-21</td>
                <td>Amoxicillin 2x1</td>
                <td class="space-x-2">
                    <button class="bg-green-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Lihat
                    </button>
                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>
                </td>
            </tr>

        </tbody>
    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/resep_admin.blade.php ENDPATH**/ ?>