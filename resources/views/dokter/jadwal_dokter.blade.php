@extends('layouts.dokter')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">


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

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Total Jadwal
                </p>

                <h2 class="text-4xl font-bold mt-2 text-slate-800">
                    {{ $totalJadwal }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i data-feather="calendar" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Menunggu
                </p>

                <h2 class="text-4xl font-bold mt-2 text-yellow-500">
                    {{ $totalMenunggu }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center">

                <i data-feather="clock" class="text-yellow-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Sedang Berjalan
                </p>

                <h2 class="text-4xl font-bold mt-2 text-blue-600">
                    {{ $totalDisetujui }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i data-feather="activity" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Selesai
                </p>

                <h2 class="text-4xl font-bold mt-2 text-emerald-600">
                    {{ $totalSelesai }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                <i data-feather="check-circle" class="text-green-600"></i>

            </div>

        </div>

    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">

    <!-- TABEL ANTREAN -->
    <!-- div class="lg:col-span-2 bg-white rounded-3xl shadow-sm -->
    <div class="lg:col-span-5">

        <div class="bg-white rounded-3xl shadow-sm p-6 h-[600px] flex flex-col">

            <div class="py-3 border-b flex items-center justify-between">

                <h2 class="text-xl font-bold text-slate-800">
                    Antrean Konsultasi
                </h2>

                <form method="GET">

                    <select
                        name="status"
                        onchange="this.form.submit()"
                        class="border border-slate-200 rounded-xl px-4 py-2
                   text-sm focus:outline-none focus:ring-2
                   focus:ring-blue-500">

                        <option value="">
                            Semua Status
                        </option>

                        <option
                            value="menunggu"
                            {{ request('status') == 'menunggu' ? 'selected' : '' }}>

                            Menunggu

                        </option>

                        <option
                            value="berjalan"
                            {{ request('status') == 'berjalan' ? 'selected' : '' }}>

                            Sedang Berjalan

                        </option>

                        <option
                            value="selesai"
                            {{ request('status') == 'selesai' ? 'selected' : '' }}>

                            Selesai

                        </option>

                    </select>

                </form>

            </div>

            <div class="flex-1 overflow-y-auto p-6 space-y-3">

                @forelse($jadwal as $item)

                <div class="bg-white border border-slate-200 rounded-2xl px-5 py-4">

                    <div class="grid grid-cols-12 gap-4 items-center">

                        <!-- RM -->
                        <div class="col-span-1">

                            <p class="text-xs text-slate-500">
                                No RM
                            </p>

                            <p class="font-bold text-blue-600">
                                {{ $item->pasien->no_rm ?? '-' }}
                            </p>

                        </div>

                        <!-- NOMOR ANTRIAN -->
                        <div class="col-span-1">

                            <p class="text-xs text-slate-500">
                                Antrian
                            </p>

                            <p class="font-bold text-emerald-600">
                                {{ $item->nomor_antrian ?? '-' }}
                            </p>

                        </div>

                        <!-- PASIEN -->
                        <div class="col-span-3">

                            <h3 class="font-bold text-xl text-slate-800">
                                {{ $item->pasien->name }}
                            </h3>

                            <p class="text-slate-600 text-sm mt-1">
                                {{ $item->keluhan }}
                            </p>

                        </div>

                        <!-- WAKTU -->
                        <div class="col-span-2">

                            <p class="text-xs text-slate-500">
                                Waktu
                            </p>

                            <p class="font-semibold text-slate-700">
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                            </p>

                            <p class="font-bold text-blue-600 text-xl">
                                {{ substr($item->jam,0,5) }}
                            </p>

                        </div>

                        <!-- STATUS -->
                        <div class="col-span-2">

                            @if($item->status == 'Menunggu')

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

                            @elseif($item->status == 'Dibatalkan')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                Dibatalkan
                            </span>

                            @endif

                        </div>

                        <!-- AKSI -->
                        <div class="col-span-2">

                            @if($item->status == 'Menunggu')

                            <a href="{{ route('dokter.konsultasi', $item->id) }}"
                                class="block text-center bg-blue-600 text-white py-2 rounded-xl mb-2">

                                Mulai

                            </a>

                            <form action="{{ route('jadwal.batal', $item->id) }}" method="POST">
                                @csrf

                                <button
                                    class="w-full bg-red-500 text-white py-2 rounded-xl">

                                    Batal

                                </button>

                            </form>

                            @endif

                        </div>

                    </div>

                </div>

                @empty

                <div class="bg-white rounded-2xl p-10 text-center text-slate-500">

                    Belum ada jadwal konsultasi

                </div>

                @endforelse

            </div>

        </div>

    </div>


</div>

@endsection