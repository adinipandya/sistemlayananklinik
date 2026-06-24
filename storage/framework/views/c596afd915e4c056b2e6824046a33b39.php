<?php $__env->startSection('content'); ?>

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Profil Pasien
    </h1>

    <p class="text-slate-500 mt-1">
        Kelola informasi akun dan data pribadi Anda
    </p>

</div>

<div class="grid lg:grid-cols-3 gap-6">

    <!-- FOTO PROFIL -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 text-center">

        <div class="w-40 h-40 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-20 h-20 text-blue-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.88 17.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

            </svg>

        </div>

        <h2 class="text-2xl font-bold mt-5">
            <?php echo e(Auth::user()->name); ?>

        </h2>

        <p class="text-slate-500">
            Pasien
        </p>

        <button
            class="mt-5 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700">

            Ganti Foto

        </button>

    </div>

    <!-- INFORMASI AKUN -->
    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 p-6">

        <h2 class="text-2xl font-bold mb-6">
            Informasi Akun
        </h2>

        <form>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <label class="block mb-2 text-slate-600">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        value="<?php echo e(Auth::user()->name); ?>"
                        class="w-full border rounded-xl p-3">
                </div>
<div>
    <label class="block mb-2 text-slate-600">
        NIK
    </label>

    <input
        type="text"
        placeholder="Masukkan NIK"
        class="w-full border rounded-xl p-3">
</div>
                <div>
                    <label class="block mb-2 text-slate-600">
                        Email
                    </label>

                    <input
                        type="email"
                        value="<?php echo e(Auth::user()->email); ?>"
                        class="w-full border rounded-xl p-3">
                </div>

                <div>
                    <label class="block mb-2 text-slate-600">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        placeholder="08xxxxxxxxxx"
                        class="w-full border rounded-xl p-3">
                </div>

                <div>
                    <label class="block mb-2 text-slate-600">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        class="w-full border rounded-xl p-3">
                </div>

                <div>
                    <label class="block mb-2 text-slate-600">
                        Jenis Kelamin
                    </label>

                    <select class="w-full border rounded-xl p-3">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-slate-600">
                        Alamat
                    </label>

                    <input
                        type="text"
                        placeholder="Masukkan alamat"
                        class="w-full border rounded-xl p-3">
                </div>

            </div>

            <button
                type="submit"
                class="mt-8 bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/profile_pasien.blade.php ENDPATH**/ ?>