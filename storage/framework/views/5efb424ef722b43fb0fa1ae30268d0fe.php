<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6">
    Pengaturan Akun
</h1>

<div class="bg-white rounded-2xl shadow-sm p-6 max-w-3xl">

    <form>

        <div class="mb-4">

            <label class="block mb-2">
                Nama
            </label>

            <input type="text"
            value="<?php echo e(Auth::user()->name); ?>"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Email
            </label>

            <input type="email"
            value="<?php echo e(Auth::user()->email); ?>"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Nomor HP
            </label>

            <input type="text"
            placeholder="08xxxxxxxxxx"
            class="w-full border rounded-xl p-3">

        </div>

        <button
        class="bg-blue-600 text-white px-6 py-3 rounded-xl">

            Simpan Perubahan

        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/pengaturan.blade.php ENDPATH**/ ?>