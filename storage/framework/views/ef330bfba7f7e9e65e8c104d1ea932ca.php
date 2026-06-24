<?php $__env->startSection('content'); ?>

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Profil Dokter
    </h1>

    <p class="text-slate-500 mt-2">
        Kelola informasi akun dan data praktik dokter
    </p>

</div>

<?php if(session('success')): ?>

<div
    class="mb-6 bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">

    <?php echo e(session('success')); ?>


</div>

<?php endif; ?>

<div class="grid lg:grid-cols-3 gap-6">

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <div class="flex flex-col items-center">

            <?php if(Auth::user()->photo): ?>

            <img
                src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>"
                class="w-40 h-40 rounded-full object-cover border-4 border-emerald-100">

            <?php else: ?>

            <div
                class="w-40 h-40 rounded-full bg-blue-100 flex items-center justify-center">

                <i
                    data-feather="user"
                    class="w-16 h-16 text-emerald-600">
                </i>

            </div>

            <?php endif; ?>

            <h2 class="text-2xl font-bold mt-5">

                <?php echo e(Auth::user()->name); ?>


            </h2>

            <p class="text-slate-500">
                Dokter Umum
            </p>

            <label
                for="photo"
                class="mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl cursor-pointer">

                Ganti Foto

            </label>

        </div>

        <div class="mt-8 border-t pt-6">

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        SIP
                    </span>

                    <span class="font-medium">
                        SIP-2026-001
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Spesialisasi
                    </span>

                    <span class="font-medium">
                        Dokter Umum
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Praktik
                    </span>

                    <span class="font-medium">
                        08:00 - 16:00
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Status
                    </span>

                    <span
                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                        Aktif

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="lg:col-span-2">

        <form
            action="/dokter/profile"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-3xl shadow-sm p-8">

            <?php echo csrf_field(); ?>

            <input
                type="file"
                name="photo"
                id="photo"
                class="hidden">

            <h2 class="text-xl font-bold mb-6">
                Informasi Akun
            </h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="<?php echo e(Auth::user()->name); ?>"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="<?php echo e(Auth::user()->email); ?>"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nomor HP

                    </label>

                    <input
                        type="text"
                        placeholder="08123456789"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nomor SIP

                    </label>

                    <input
                        type="text"
                        value="SIP-2026-001"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Spesialisasi

                    </label>

                    <input
                        type="text"
                        value="Dokter Umum"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Jadwal Praktik

                    </label>

                    <input
                        type="text"
                        value="08:00 - 16:00"
                        class="w-full border rounded-2xl p-3">

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl">

                    Simpan Perubahan

                </button>

                <a
                    href="/dokter/password"
                    class="border px-6 py-3 rounded-2xl hover:bg-slate-50">

                    Ubah Password

                </a>

            </div>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/dokter/profile.blade.php ENDPATH**/ ?>