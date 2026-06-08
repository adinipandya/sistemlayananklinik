@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Kelola Dokter 👨‍⚕️
</h1>

<!-- TOMBOL TAMBAH DOKTER -->
<div class="mb-6">
    <button onclick="openModal()"
            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg shadow">
        + Tambah Dokter
    </button>
</div>

<!-- MODAL TAMBAH DOKTER -->
<div id="modalTambah"
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">
                Tambah Dokter
            </h2>

            <button onclick="closeModal()"
                    type="button"
                    class="text-gray-500 text-xl">
                ✕
            </button>
        </div>

        <form action="/admin/dokter/store" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block mb-1">
                    Nama Dokter
                </label>

                <input type="text"
                       name="nama"
                       class="border p-2 rounded w-full"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">
                    Spesialis
                </label>

                <input type="text"
                       name="spesialis"
                       class="border p-2 rounded w-full"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">
                    Telepon
                </label>

                <input type="text"
                       name="telepon"
                       class="border p-2 rounded w-full"
                       required>
            </div>

            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="closeModal()"
                        class="bg-gray-300 px-4 py-2 rounded">
                    Batal
                </button>

                <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<!-- DATA DOKTER -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($dokters as $dokter)

    <div class="bg-white rounded-xl shadow p-5 hover:shadow-lg transition">

        <div class="text-center">

            <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto text-3xl">
                👨‍⚕️
            </div>

            <h2 class="font-bold text-lg mt-3">
                {{ $dokter->nama }}
            </h2>

            <p class="text-gray-500">
                {{ $dokter->spesialis }}
            </p>

            <p class="mt-2 text-sm text-gray-600">
                {{ $dokter->telepon }}
            </p>

        </div>

        <div class="flex gap-2 mt-5">

            <form action="/admin/dokter/update/{{ $dokter->id }}"
                  method="POST"
                  class="flex-1">

                @csrf
                @method('PUT')

                <button type="submit"
                        class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
                    Edit
                </button>

            </form>

            <form action="/admin/dokter/delete/{{ $dokter->id }}"
                  method="POST"
                  class="flex-1">

                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Yakin hapus?')"
                        class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
                    Hapus
                </button>

            </form>

        </div>

    </div>

    @endforeach

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

@endsection