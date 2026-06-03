@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Kelola Pasien 👥
</h1>

<!-- BUTTON TAMBAH -->
<div class="mb-6 animate-fadeInUp delay-1">
    <button class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-green-500 hover:scale-105 transition">
        + Tambah Pasien
    </button>
</div>

<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow animate-fadeInUp delay-2">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <!-- ROW -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition">
                <td class="py-3">1</td>
                <td>Ihsan</td>
                <td>21</td>
                <td>Laki-laki</td>
                <td>08123456789</td>
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
                <td>Ardi</td>
                <td>23</td>
                <td>Laki-laki</td>
                <td>08129876543</td>
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

@endsection