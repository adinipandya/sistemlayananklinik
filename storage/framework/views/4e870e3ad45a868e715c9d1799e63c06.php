

<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6">
    Kelola Pasien 👥
</h1>

<!-- BUTTON TAMBAH PASIEN -->

<div class="mb-6">
    <button onclick="openModal()"
            class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 transition">
        + Tambah Pasien
    </button>
</div>

<!-- MODAL TAMBAH PASIEN -->

<div id="modalTambah"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

```
<div class="bg-white w-full max-w-lg p-6 rounded-xl shadow-lg">

    <div class="flex justify-between items-center mb-4">

        <h2 class="text-xl font-bold">
            Tambah Pasien
        </h2>

        <button onclick="closeModal()"
                type="button"
                class="text-xl text-gray-500">
            ✕
        </button>

    </div>

    <form>

        <div class="mb-3">
            <label class="block mb-1">
                Nomor
            </label>
            <input type="number"
                   class="border p-2 rounded w-full">
        </div>

        <div class="mb-3">
            <label class="block mb-1">
                Nama
            </label>
            <input type="text"
                   class="border p-2 rounded w-full">
        </div>

        <div class="mb-3">
            <label class="block mb-1">
                Umur
            </label>
            <input type="number"
                   class="border p-2 rounded w-full">
        </div>

        <div class="mb-3">
            <label class="block mb-1">
                Jenis Kelamin
            </label>

            <select class="border p-2 rounded w-full">
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">
                No HP
            </label>
            <input type="text"
                   class="border p-2 rounded w-full">
        </div>

        <div class="flex justify-end gap-2">

            <button type="button"
                    onclick="closeModal()"
                    class="bg-gray-300 px-4 py-2 rounded">
                Batal
            </button>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded">
                Simpan
            </button>

        </div>

    </form>

</div>
```

</div>

<!-- CARD PASIEN -->

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

```
<!-- PASIEN 1 -->
<div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

    <div class="text-center">

        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto text-3xl">
            👤
        </div>

        <h2 class="font-bold text-lg mt-3">
            Ihsan
        </h2>

        <p class="text-gray-500">
            Umur: 21 Tahun
        </p>

        <p class="text-gray-500">
            Laki-laki
        </p>

        <p class="text-gray-500">
            08123456789
        </p>

    </div>

    <div class="flex gap-2 mt-5">

        <button
            class="flex-1 bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
            Edit
        </button>

        <button
            onclick="return confirm('Yakin hapus?')"
            class="flex-1 bg-red-500 text-white py-2 rounded hover:bg-red-600">
            Hapus
        </button>

    </div>

</div>

<!-- PASIEN 2 -->
<div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

    <div class="text-center">

        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto text-3xl">
            👤
        </div>

        <h2 class="font-bold text-lg mt-3">
            Ardi
        </h2>

        <p class="text-gray-500">
            Umur: 23 Tahun
        </p>

        <p class="text-gray-500">
            Laki-laki
        </p>

        <p class="text-gray-500">
            08129876543
        </p>

    </div>

    <div class="flex gap-2 mt-5">

        <button
            class="flex-1 bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
            Edit
        </button>

        <button
            onclick="return confirm('Yakin hapus?')"
            class="flex-1 bg-red-500 text-white py-2 rounded hover:bg-red-600">
            Hapus
        </button>

    </div>

</div>
```

</div>

<script>

function openModal() {
    document.getElementById('modalTambah').classList.remove('hidden');
    document.getElementById('modalTambah').classList.add('flex');
}

function closeModal() {
    document.getElementById('modalTambah').classList.remove('flex');
    document.getElementById('modalTambah').classList.add('hidden');
}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/admin/pasien_admin.blade.php ENDPATH**/ ?>