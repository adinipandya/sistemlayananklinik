@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Kelola Dokter 👨‍⚕️
</h1>

{{-- FORM TAMBAH DOKTER --}}
<div class="bg-white p-6 rounded-xl shadow mb-6">

    <form action="/admin/dokter/store" method="POST">

        @csrf

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

{{-- TABLE DOKTER --}}
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

            @foreach($dokters as $dokter)

            <tr class="border-b">

                <form action="/admin/dokter/update/{{ $dokter->id }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <td class="p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="nama"
                               value="{{ $dokter->nama }}"
                               class="border p-1 rounded w-full"
                               required>
                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="spesialis"
                               value="{{ $dokter->spesialis }}"
                               class="border p-1 rounded w-full"
                               required>
                    </td>

                    <td class="p-3">
                        <input type="text"
                               name="telepon"
                               value="{{ $dokter->telepon }}"
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

                <form action="/admin/dokter/delete/{{ $dokter->id }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('Yakin hapus?')"
                            class="bg-red-500 text-white px-4 py-2 rounded h-10 hover:bg-red-600 transition">
                        Hapus
                    </button>

                </form>

                        </div>

                    </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection