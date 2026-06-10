@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Rekam Medis
        </h1>

        <p class="text-slate-500 mt-2">
            Riwayat pemeriksaan dan tindakan medis pasien
        </p>

    </div>

    <button class="bg-blue-600 text-white px-5 py-3 rounded-2xl">

        Export Data

    </button>

</div>

<!-- STATISTIK -->
<div class="grid lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Total Rekam
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $totalRekam }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Hari Ini
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            {{ $rekamHariIni }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Selesai
        </p>

        <h2 class="text-4xl font-bold mt-2 text-emerald-600">
            {{ $totalRekam }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Menunggu
        </p>

        <h2 class="text-4xl font-bold mt-2 text-yellow-500">
            0
        </h2>

    </div>

</div>

<!-- SEARCH -->
<div class="bg-white rounded-3xl shadow-sm p-6 mb-6">

    <div class="flex gap-3">

        <input type="text" placeholder="Cari nama pasien..." class="flex-1 border rounded-2xl px-5 py-3">

        <button class="bg-blue-600 text-white px-6 rounded-2xl">

            Cari

        </button>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">

        <h2 class="font-bold">
            Daftar Rekam Medis
        </h2>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="p-5 text-left">
                        No RM
                    </th>

                    <th class="p-5 text-left">
                        Pasien
                    </th>

                    <th class="p-5 text-left">
                        Tanggal
                    </th>

                    <th class="p-5 text-left">
                        Diagnosa
                    </th>

                    <th class="p-5 text-left">
                        Status
                    </th>

                    <th class="p-5 text-left">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($rekamMedis as $rekam)

                <tr class="border-t hover:bg-slate-50">

                    <td class="p-5">

                        RM{{ str_pad($rekam->jadwal->pasien->id, 3, '0', STR_PAD_LEFT) }}

                    </td>

                    <td class="p-5 font-medium">

                        {{ $rekam->jadwal->pasien->name }}

                    </td>

                    <td class="p-5">

                        {{ $rekam->created_at->format('d M Y') }}

                    </td>

                    <td class="p-5">

                        {{ Str::limit($rekam->diagnosa, 40) }}

                    </td>

                    <td class="p-5">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            Selesai

                        </span>

                    </td>

                    <td class="p-5">

                        <div class="flex gap-2">

                            <a href="/dokter/rekam-medis/detail/{{ $rekam->id }}"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg">

                                Detail

                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center p-8 text-slate-500">

                        Belum ada rekam medis

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- AKTIVITAS -->
<div class="grid lg:grid-cols-2 gap-6 mt-8">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <h2 class="font-bold mb-5">
            Diagnosa Terbanyak
        </h2>

        <div class="space-y-4">

            <div class="flex justify-between">

                <span>Influenza</span>
                <b>12</b>

            </div>

            <div class="flex justify-between">

                <span>Batuk</span>
                <b>8</b>

            </div>

            <div class="flex justify-between">

                <span>Sakit Kepala</span>
                <b>5</b>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <h2 class="font-bold mb-5">
            Aktivitas Terakhir
        </h2>

        <div class="space-y-4">

            <div class="border-l-4 border-emerald-500 pl-4">

                <p class="font-medium">
                    Rekam medis Ihsan diperbarui
                </p>

                <p class="text-sm text-slate-500">
                    10 menit lalu
                </p>

            </div>

            <div class="border-l-4 border-blue-500 pl-4">

                <p class="font-medium">
                    Rekam medis Ardi dibuat
                </p>

                <p class="text-sm text-slate-500">
                    30 menit lalu
                </p>

            </div>

            <div class="border-l-4 border-yellow-500 pl-4">

                <p class="font-medium">
                    Pemeriksaan Dini selesai
                </p>

                <p class="text-sm text-slate-500">
                    1 jam lalu
                </p>

            </div>

        </div>

    </div>

</div>

@endsection