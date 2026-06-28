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

</div>

<!-- STATISTIK -->
<!-- STATISTIK -->
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Total Rekam
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalRekam }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i data-feather="file-text" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Hari Ini
                </p>

                <h2 class="text-4xl font-bold mt-2 text-blue-600">
                    {{ $rekamHariIni }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center">

                <i data-feather="calendar" class="text-cyan-600"></i>

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
                    {{ $totalRekam }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                <i data-feather="check-circle" class="text-green-600"></i>

            </div>

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="p-6 border-b">

    <!-- Header + Search -->

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-xl font-bold text-slate-800">
                Daftar Rekam Medis
            </h2>

            <form
                method="GET"
                action="{{ route('dokter.kelola') }}"
                class="flex">

                <div class="relative">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama pasien..."
                        class="w-80 border rounded-2xl py-3 pl-5 pr-12
                   focus:outline-none focus:ring-2
                   focus:ring-blue-500">

                    <button
                        type="submit"
                        class="absolute right-4 top-1/2
                   -translate-y-1/2 z-10">

                        <i
                            data-feather="search"
                            class="w-5 h-5 text-slate-500 hover:text-blue-600">
                        </i>

                    </button>

                </div>

            </form>

        </div>

        <div class="h-[650px] overflow-y-auto overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 sticky top-0 z-10">

                    <tr>

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
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @if(!request('search'))

                    <tr>
                        <td colspan="6"
                            class="text-center p-10 text-slate-500">

                            Cari pasien terlebih dahulu

                        </td>
                    </tr>

                    @elseif($rekamMedis->count())

                    @forelse($rekamMedis as $rekam)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="p-5">

                            <p class="font-semibold">
                                {{ $rekam->jadwal->pasien->name }}
                            </p>

                            <span class="text-xs text-blue-600">
                                {{ $rekam->jadwal->pasien->no_rm ?? '-' }}
                            </span>

                        </td>

                        <td class="p-5">

                            {{ $rekam->created_at->format('d M Y') }}

                        </td>

                        <td class="p-5">

                            {{ Str::limit($rekam->diagnosa, 30) }}

                        </td>

                        <td class="p-5">

                            <div class="flex gap-2">

                                <a href="/dokter/rekam-medis/detail/{{ $rekam->id }}"
                                    class="border border-blue-600 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-50">

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

                    @else

                    <tr>
                        <td colspan="6"
                            class="text-center p-10 text-slate-500">

                            Data tidak ditemukan

                        </td>
                    </tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>

    @endsection