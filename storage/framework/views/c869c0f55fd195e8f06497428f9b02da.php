<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6">
    Ubah Password
</h1>

<div class="bg-white rounded-2xl shadow-sm p-6 max-w-2xl">

    <form>

        <div class="mb-4">

            <label class="block mb-2">
                Password Lama
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Password Baru
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Konfirmasi Password Baru
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <button
        class="bg-green-600 text-white px-6 py-3 rounded-xl">

            Update Password

        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/password.blade.php ENDPATH**/ ?>