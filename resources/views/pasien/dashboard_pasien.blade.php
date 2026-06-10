@extends('layouts.pasien')

@section('content')

<div class="mb-8">


<h1 class="text-3xl font-bold text-slate-800">
    Dashboard Pasien
</h1>

<p class="text-slate-500 mt-1">
    Selamat datang, {{ Auth::user()->name }}
</p>


</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-4 gap-5 mb-8">


<div class="bg-white border border-slate-200 rounded-xl p-5">
    <p class="text-sm text-slate-500">Booking Aktif</p>
    <h2 class="text-3xl font-bold text-blue-600 mt-2">1</h2>
</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">
    <p class="text-sm text-slate-500">Konsultasi Selesai</p>
    <h2 class="text-3xl font-bold text-green-600 mt-2">8</h2>
</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">
    <p class="text-sm text-slate-500">Rekam Medis</p>
    <h2 class="text-3xl font-bold text-blue-600 mt-2">8</h2>
</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">
    <p class="text-sm text-slate-500">Feedback</p>
    <h2 class="text-3xl font-bold text-green-600 mt-2">3</h2>
</div>


</div>

<!-- QUICK ACTION -->

<div class="grid md:grid-cols-4 gap-5 mb-8">


<a href="/pasien/booking"
    class="bg-blue-600 text-white rounded-xl p-5 hover:bg-blue-700 transition">

    <h2 class="font-semibold text-lg">
        Booking Konsultasi
    </h2>

    <p class="text-sm opacity-90 mt-1">
        Buat jadwal konsultasi
    </p>

</a>

<a href="/pasien/jadwal"
    class="bg-green-600 text-white rounded-xl p-5 hover:bg-green-700 transition">

    <h2 class="font-semibold text-lg">
        Jadwal Saya
    </h2>

    <p class="text-sm opacity-90 mt-1">
        Lihat jadwal konsultasi
    </p>

</a>

<a href="/pasien/rekam-medis"
    class="bg-white border border-slate-200 rounded-xl p-5 hover:bg-slate-50">

    <h2 class="font-semibold text-lg text-slate-700">
        Rekam Medis
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Riwayat kesehatan
    </p>

</a>

<a href="/pasien/feedback"
    class="bg-white border border-slate-200 rounded-xl p-5 hover:bg-slate-50">

    <h2 class="font-semibold text-lg text-slate-700">
        Feedback
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Berikan penilaian
    </p>

</a>


</div>

<!-- INFORMASI -->

<div class="grid lg:grid-cols-2 gap-6 mb-8">


<div class="bg-white border border-slate-200 rounded-xl p-6">

    <h2 class="font-semibold text-lg mb-4">
        Jadwal Konsultasi Berikutnya
    </h2>

    <div class="space-y-2">

        <p><b>Dokter :</b> Dr. Ardi</p>
        <p><b>Tanggal :</b> 10 Juni 2026</p>
        <p><b>Jam :</b> 09.00 WIB</p>

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Dikonfirmasi
        </span>

    </div>

</div>

<div class="bg-white border border-slate-200 rounded-xl p-6">

    <h2 class="font-semibold text-lg mb-4">
        Rekam Medis Terakhir
    </h2>

    <div class="space-y-2">

        <p><b>Diagnosa :</b> Influenza Ringan</p>
        <p><b>Dokter :</b> Dr. Ardi</p>
        <p><b>Tanggal :</b> 05 Juni 2026</p>

    </div>

</div>


</div>

<!-- RIWAYAT -->

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Riwayat Konsultasi Terbaru
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>

            <th class="text-left p-4">Tanggal</th>
            <th class="text-left p-4">Dokter</th>
            <th class="text-left p-4">Diagnosa</th>
            <th class="text-left p-4">Status</th>

        </tr>

    </thead>

    <tbody>

        <tr class="border-t">
            <td class="p-4">05 Jun 2026</td>
            <td class="p-4">Dr. Ardi</td>
            <td class="p-4">Influenza</td>
            <td class="p-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                    Selesai
                </span>
            </td>
        </tr>

        <tr class="border-t">
            <td class="p-4">20 Mei 2026</td>
            <td class="p-4">Dr. Ihsan</td>
            <td class="p-4">Batuk</td>
            <td class="p-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                    Selesai
                </span>
            </td>
        </tr>

    </tbody>

</table>


</div>

@endsection
