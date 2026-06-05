@extends('layouts.dokter')

@section('content')

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Dokter
    </h1>

    <p class="text-slate-500 mt-1">
        Selamat datang, Dr. {{ Auth::user()->name }}
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Jadwal Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            5
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Pasien Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            12
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Konsultasi Aktif
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            3
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Rekam Medis
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            25
        </h2>

    </div>

</div>

<!-- JADWAL + PASIEN -->
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <!-- JADWAL -->
    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold text-slate-700">
                Jadwal Konsultasi Hari Ini
            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="text-left p-4">
                        Jam
                    </th>

                    <th class="text-left p-4">
                        Pasien
                    </th>

                    <th class="text-left p-4">
                        Keluhan
                    </th>

                    <th class="text-left p-4">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr class="border-t">

                    <td class="p-4">08:00</td>
                    <td class="p-4">Ihsan</td>
                    <td class="p-4">Demam</td>

                    <td class="p-4">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Selesai
                        </span>

                    </td>

                </tr>

                <tr class="border-t">

                    <td class="p-4">09:00</td>
                    <td class="p-4">Ardi</td>
                    <td class="p-4">Batuk</td>

                    <td class="p-4">

                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            Menunggu
                        </span>

                    </td>

                </tr>

                <tr class="border-t">

                    <td class="p-4">10:00</td>
                    <td class="p-4">Dini</td>
                    <td class="p-4">Sakit Kepala</td>

                    <td class="p-4">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                            Proses
                        </span>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <!-- PROFIL DOKTER -->
    <div class="bg-white border border-slate-200 rounded-xl p-6">

        <div class="flex flex-col items-center">

            <div class="flex flex-col items-center">

            @if(Auth::user()->photo)

            </div>

            <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100">

            @else

            <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center">

                <i data-feather="user" class="w-12 h-12 text-blue-600"></i>

            </div>

            @endif

            <h3 class="font-semibold text-lg">
                {{ Auth::user()->name }}
            </h3>

            <p class="text-slate-500 text-sm">
                Dokter Umum
            </p>

        </div>

        <div class="mt-6 space-y-3 text-sm">

            <div class="flex justify-between">
                <span class="text-slate-500">Poliklinik</span>
                <span>Umum</span>
            </div>

            <div class="flex justify-between">
                <span class="text-slate-500">Pasien Hari Ini</span>
                <span>12</span>
            </div>

            <div class="flex justify-between">
                <span class="text-slate-500">Jadwal</span>
                <span>5</span>
            </div>

        </div>

    </div>

</div>

<!-- AKSI CEPAT -->
<div class="grid md:grid-cols-3 gap-5">

    <a href="/dokter/konsultasi"
       class="bg-blue-600 text-white rounded-xl p-5 hover:bg-blue-700 transition">

        <h2 class="font-semibold text-lg">
            Konsultasi Pasien
        </h2>

        <p class="text-sm opacity-90 mt-1">
            Kelola konsultasi pasien
        </p>

    </a>

    <a href="/dokter/kelola"
       class="bg-green-600 text-white rounded-xl p-5 hover:bg-green-700 transition">

        <h2 class="font-semibold text-lg">
            Rekam Medis
        </h2>

        <p class="text-sm opacity-90 mt-1">
            Kelola data rekam medis
        </p>

    </a>

    <a href="/dokter/jadwal"
       class="bg-white border border-slate-200 rounded-xl p-5 hover:bg-slate-50 transition">

        <h2 class="font-semibold text-lg text-slate-700">
            Jadwal Praktik
        </h2>

        <p class="text-sm text-slate-500 mt-1">
            Lihat jadwal dokter
        </p>

    </a>

</div>

@endsection