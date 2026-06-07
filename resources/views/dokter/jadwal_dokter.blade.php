@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">


    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Jadwal Konsultasi
        </h1>

        <p class="text-slate-500 mt-2">
            Kelola antrean pasien dan konsultasi hari ini
        </p>

    </div>


</div>

<!-- STATISTIK -->

<div class="grid lg:grid-cols-4 gap-6 mb-8">


    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Total Jadwal
        </p>

        <h2 class="text-4xl font-bold mt-2 text-slate-800">
            {{ $totalJadwal }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Menunggu
        </p>

        <h2 class="text-4xl font-bold mt-2 text-yellow-500">
            {{ $totalMenunggu }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Sedang Berjalan
        </p>

        <h2 class="text-4xl font-bold mt-2 text-blue-600">
            {{ $totalDisetujui }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Selesai
        </p>

        <h2 class="text-4xl font-bold mt-2 text-emerald-600">
            {{ $totalSelesai }}
        </h2>

    </div>


</div>

<div class="grid lg:grid-cols-3 gap-6">


    <!-- TABEL ANTREAN -->
    <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm">

        <div class="p-6 border-b">

            <h2 class="font-bold text-lg">
                Antrean Konsultasi
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50 border-b">

                        <th class="p-4 text-left">
                            Tanggal
                        </th>

                        <th class="p-4 text-left">
                            Jam
                        </th>

                        <th class="p-4 text-left">
                            Pasien
                        </th>

                        <th class="p-4 text-left">
                            Keluhan
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4 text-left">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($jadwal as $item)

                    <tr class="border-b hover:bg-slate-50">

                        <td class="p-4">

                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                        </td>

                        <td class="p-4 font-semibold text-blue-600">

                            {{ substr($item->jam,0,5) }}

                        </td>

                        <td class="p-4 font-medium">

                            {{ $item->pasien->name }}

                        </td>

                        <td class="p-4">

                            {{ $item->keluhan }}

                        </td>

                        <td class="p-4">

                            @php
                            $terlambat =
                            $item->status == 'Menunggu' &&
                            \Carbon\Carbon::parse($item->tanggal . ' ' . $item->jam)->isPast();
                            @endphp

                            @if($terlambat)

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Terlambat
                            </span>

                            @elseif($item->status == 'Menunggu')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                                Menunggu
                            </span>

                            @elseif($item->status == 'Disetujui')

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                Sedang Berjalan
                            </span>

                            @elseif($item->status == 'Selesai')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                Selesai
                            </span>

                            @elseif($terlambat)

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm">
                                Jadwal Terlewat
                            </span>

                            @elseif($item->status == 'Dibatalkan')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Dibatalkan
                            </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <div class="flex gap-2">

                                @if($item->status == 'Menunggu')

                                <a href="{{ route('dokter.konsultasi', $item->id) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">

                                    Mulai

                                </a>

                                <form action="{{ route('jadwal.batal', $item->id) }}" method="POST">

                                    @csrf

                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                        Batal

                                    </button>

                                </form>

                                @elseif($item->status == 'Selesai')

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm">

                                    Konsultasi Selesai

                                </span>

                                @elseif($item->status == 'Dibatalkan')

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-sm">

                                    Dibatalkan

                                </span>

                                @endif

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center p-8 text-slate-500">

                            Belum ada jadwal konsultasi

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- SIDEBAR -->
    <div class="space-y-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <h2 class="font-bold mb-5">
                Ringkasan Hari Ini
            </h2>

            <div class="space-y-4">

                <div class="flex justify-between">
                    <span>Total Jadwal</span>
                    <b>{{ $totalJadwal }}</b>
                </div>

                <div class="flex justify-between">
                    <span>Selesai</span>
                    <b class="text-green-600">{{ $totalSelesai }}</b>
                </div>

                <div class="flex justify-between">
                    <span>Menunggu</span>
                    <b class="text-yellow-500">{{ $totalMenunggu }}</b>
                </div>

                <div class="flex justify-between">
                    <span>Berjalan</span>
                    <b class="text-blue-600">{{ $totalDisetujui }}</b>
                </div>

            </div>

        </div>

        <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white rounded-3xl p-6">

            <p class="opacity-90">
                Pasien Berikutnya
            </p>

            @if($pasienBerikutnya)

            <h2 class="text-2xl font-bold mt-2">

                {{ $pasienBerikutnya->pasien->name }}

            </h2>

            <p class="mt-2 opacity-90">

                {{ \Carbon\Carbon::parse($pasienBerikutnya->tanggal)->format('d M Y') }}
                •
                {{ substr($pasienBerikutnya->jam,0,5) }}

            </p>

            <p class="mt-3 text-sm opacity-90">

                {{ $pasienBerikutnya->keluhan }}

            </p>

            @else

            <h2 class="text-xl font-bold mt-2">

                Tidak Ada Antrean

            </h2>

            @endif

        </div>

    </div>


</div>

@endsection