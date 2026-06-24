<?php $__env->startSection('content'); ?>

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Keamanan Akun
    </h1>

    <p class="text-slate-500 mt-2">
    Ubah password akun Anda untuk menjaga keamanan sistem
</p>
   <?php if(session('error')): ?>
<div class="mb-8 mt-4 bg-red-50 border-l-4 border-red-500 px-4 py-3 rounded-lg">
    <p class="text-red-700">
        <?php echo e(session('error')); ?>

    </p>
</div>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="mb-8 mt-4 bg-green-50 border-l-4 border-green-500 px-4 py-3 rounded-lg">
    <p class="text-green-700">
        <?php echo e(session('success')); ?>

    </p>
</div>
<?php endif; ?>

<div class="grid lg:grid-cols-3 gap-6">

    <!-- INFO -->
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <div
            class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center mb-5">

            <i
                data-feather="shield"
                class="text-blue-600">
            </i>

        </div>

        <h2 class="font-bold text-xl mb-3">
            Keamanan Akun
        </h2>

        <p class="text-slate-500 leading-relaxed">

            Gunakan password yang kuat dan jangan membagikannya kepada
            siapa pun.

        </p>

        <div class="mt-8 space-y-4">

            <div
                class="flex items-center gap-3 p-4 rounded-2xl bg-slate-50">

                <i
                    data-feather="check-circle"
                    class="text-green-600">
                </i>

                <span>
                    Akun Aktif
                </span>

            </div>

            <div
                class="flex items-center gap-3 p-4 rounded-2xl bg-slate-50">

                <i
                    data-feather="lock"
                    class="text-blue-600">
                </i>

                <span>
                    Password Terenkripsi
                </span>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="lg:col-span-2">

        <form
    action="<?php echo e(route('pasien.password.update')); ?>"
    method="POST"
    class="bg-white rounded-3xl shadow-sm p-8">

    <?php echo csrf_field(); ?>

            <h2 class="font-bold text-xl mb-6">
                Ubah Password
            </h2>

            <div class="space-y-5">

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Password Lama

                    </label>

                    <div class="relative">

                        <input
    type="password"
    id="oldPassword"
    name="old_password"
    class="w-full border rounded-2xl p-4 pr-12">

                        <button
                            type="button"
                            onclick="togglePassword('oldPassword')"
                            class="absolute right-4 top-4">

                            <i data-feather="eye"></i>

                        </button>

                    </div>

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Password Baru

                    </label>

                    <div class="relative">

                        <input
    type="password"
    id="newPassword"
    name="new_password"
    class="w-full border rounded-2xl p-4 pr-12">

                        <button
                            type="button"
                            onclick="togglePassword('newPassword')"
                            class="absolute right-4 top-4">

                            <i data-feather="eye"></i>

                        </button>

                    </div>

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Konfirmasi Password Baru

                    </label>

                    <div class="relative">

                        <input
    type="password"
    id="confirmPassword"
    name="new_password_confirmation"
    class="w-full border rounded-2xl p-4 pr-12">

                        <button
                            type="button"
                            onclick="togglePassword('confirmPassword')"
                            class="absolute right-4 top-4">

                            <i data-feather="eye"></i>

                        </button>

                    </div>

                </div>

            </div>

            <!-- PASSWORD STRENGTH -->
            <div class="mt-8">
            </div>

            <div class="flex gap-3 mt-8">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl">

                    Simpan Password

                </button>

                <a
                    href="/pasien/profile"
                    class="border px-6 py-3 rounded-2xl hover:bg-slate-50">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<script>

function togglePassword(id){

    const input =
        document.getElementById(id);

    if(input.type === 'password'){

        input.type = 'text';

    }else{

        input.type = 'password';

    }
}

</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/pasien/pengaturan_pasien.blade.php ENDPATH**/ ?>