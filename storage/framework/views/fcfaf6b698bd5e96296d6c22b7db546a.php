<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Kelola Obat 💊
</h1>

<!-- BUTTON TAMBAH -->
<div class="mb-6 animate-fadeInUp delay-1">
    <button class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-green-500 hover:scale-105 transition">
        + Tambah Obat
    </button>
</div>

<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow animate-fadeInUp delay-2">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">No</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <!-- ROW -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition">
                <td class="py-3">1</td>
                <td>Paracetamol</td>
                <td>Tablet</td>
                <td>100</td>
                <td>Rp 5.000</td>
                <td class="space-x-2">

                    <button class="bg-yellow-400 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Edit
                    </button>

                    <button onclick="return confirm('Yakin hapus?')"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>

                </td>
            </tr>

            <!-- ROW -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition">
                <td class="py-3">2</td>
                <td>Amoxicillin</td>
                <td>Kapsul</td>
                <td>50</td>
                <td>Rp 10.000</td>
                <td class="space-x-2">

                    <button class="bg-yellow-400 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Edit
                    </button>

                    <button onclick="return confirm('Yakin hapus?')"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>

                </td>
            </tr>

        </tbody>
    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/admin/obat_admin.blade.php ENDPATH**/ ?>