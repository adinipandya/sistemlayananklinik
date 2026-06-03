

<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6">
    Kelola Dokter 👨‍⚕️
</h1>


<div class="bg-white p-6 rounded-xl shadow mb-6">

    <form action="/admin/dokter/store" method="POST">

        <?php echo csrf_field(); ?>

        <div class="mb-4">
            <input type="text"
                   name="nama"
                   placeholder="Nama Dokter"
                   class="border p-2 w-full rounded"
                   required>
        </div>

        <div class="mb-4">
            <input type="text"
                   name="spesialis"
                   placeholder="Spesialis"
                   class="border p-2 w-full rounded"
                   required>
        </div>

        <div class="mb-4">
            <input type="text"
                   name="telepon"
                   placeholder="No HP"
                   class="border p-2 w-full rounded"
                   required>
        </div>

        <button type="submit"
                class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 transition">
            + Tambah Dokter
        </button>

    </form>

</div>


<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full text-left border">

        <thead>
            <tr class="border-b bg-gray-100">
                <th class="p-3">No</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Spesialis</th>
                <th class="p-3">Telepon</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php $__currentLoopData = $dokters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dokter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class="border-b">

                <form action="/admin/dokter/update/<?php echo e($dokter->id); ?>"
                      method="POST">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <td class="p-3">
                        <?php echo e($loop->iteration); ?>

                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="nama"
                               value="<?php echo e($dokter->nama); ?>"
                               class="border p-1 rounded w-full"
                               required>
                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="spesialis"
                               value="<?php echo e($dokter->spesialis); ?>"
                               class="border p-1 rounded w-full"
                               required>
                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="telepon"
                               value="<?php echo e($dokter->telepon); ?>"
                               class="border p-1 rounded w-full"
                               required>
                    </td>

                    <td class="p-3">

                        <div class="flex items-center gap-2">

                            <button type="submit"
                                    class="bg-yellow-400 text-white px-4 py-2 rounded h-10 hover:bg-yellow-500 transition">
                                Edit
                            </button>

                </form>

                <form action="/admin/dokter/delete/<?php echo e($dokter->id); ?>"
                      method="POST">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit"
                            onclick="return confirm('Yakin hapus?')"
                            class="bg-red-500 text-white px-4 py-2 rounded h-10 hover:bg-red-600 transition">
                        Hapus
                    </button>

                </form>

                        </div>

                    </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/dokter_admin.blade.php ENDPATH**/ ?>