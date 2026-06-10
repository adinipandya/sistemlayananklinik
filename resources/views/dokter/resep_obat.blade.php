@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Resep Obat
        </h1>

        <p class="text-slate-500 mt-2">
            Daftar resep yang telah dibuat dokter
        </p>

    </div>

    <button class="bg-blue-600 text-white px-5 py-3 rounded-2xl">

        Buat Resep

    </button>

</div>

<!-- STATISTIK -->
<div class="grid lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Total Resep
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $totalResep }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Hari Ini
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            {{ $resepHariIni }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Ditebus
        </p>

        <h2 class="text-4xl font-bold mt-2 text-green-600">
            {{ $resepMingguIni }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Menunggu
        </p>

        <h2 class="text-4xl font-bold mt-2 text-yellow-500">
            {{ $resepBulanIni }}
        </h2>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">

        <h2 class="font-bold">
            Daftar Resep
        </h2>

    </div>

    <table class="w-full">

        <thead>

            <tr class="bg-slate-50">

                <th class="p-4 text-left">
                    No RM
                </th>

                <th class="p-4 text-left">
                    Pasien
                </th>

                <th class="p-4 text-left">
                    Tanggal
                </th>

                <th class="p-4 text-left">
                    Diagnosa
                </th>

                <th class="p-4 text-left">
                    Jumlah Obat
                </th>

                <th class="p-4 text-left">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($rekamMedis as $item)

            <tr class="border-b hover:bg-slate-50">

                <td class="p-4 font-medium text-blue-600">
                    {{ $item->no_rekam_medis }}
                </td>

                <td class="p-4">
                    {{ $item->jadwal->pasien->name }}
                </td>

                <td class="p-4">
                    {{ $item->created_at->format('d M Y') }}
                </td>

                <td class="p-4">
                    {{ $item->diagnosa }}
                </td>

                <td class="p-4">
                    {{ $item->resepObat->count() }} Obat
                </td>

                <td class="p-4">

                    <a href="{{ route('resep.detail', $item->id) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                        Detail

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-6 text-slate-500">
                    Belum ada resep obat
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection