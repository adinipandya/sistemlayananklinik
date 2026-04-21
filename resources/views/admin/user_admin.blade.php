@extends('layouts.admin')

@section('content')

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Manajemen User 👤
</h1>

<!-- BUTTON TAMBAH -->
<div class="mb-4 animate-fadeInUp delay-1">
    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:scale-105 transition">
        + Tambah User
    </button>
</div>

<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl transition duration-300 animate-fadeInUp delay-2">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <!-- ROW 1 -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">1</td>
                <td>Admin Utama</td>
                <td>admin@gmail.com</td>
                <td>
                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm">
                        Admin
                    </span>
                </td>
                <td class="space-x-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Edit
                    </button>
                    <button onclick="return confirm('Yakin hapus user?')" 
                            class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>
                </td>
            </tr>

            <!-- ROW 2 -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">2</td>
                <td>Dr. Andi</td>
                <td>dokter@gmail.com</td>
                <td>
                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                        Dokter
                    </span>
                </td>
                <td class="space-x-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Edit
                    </button>
                    <button onclick="return confirm('Yakin hapus user?')" 
                            class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>
                </td>
            </tr>

            <!-- ROW 3 -->
            <tr class="hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">3</td>
                <td>Ihsan</td>
                <td>pasien@gmail.com</td>
                <td>
                    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                        Pasien
                    </span>
                </td>
                <td class="space-x-2">
                    <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Edit
                    </button>
                    <button onclick="return confirm('Yakin hapus user?')" 
                            class="bg-red-500 text-white px-3 py-1 rounded hover:scale-105 transition">
                        Hapus
                    </button>
                </td>
            </tr>

        </tbody>
    </table>

</div>

@endsection