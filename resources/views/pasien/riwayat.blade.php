@extends('layouts.pasien')

@section('content')

<h1 class="text-2xl font-bold mb-6">Riwayat Konsultasi</h1>

<div class="space-y-4">

    <!-- ITEM 1 -->
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="font-semibold">Dr. Ardi</p>
            <p class="text-sm text-gray-500">20 Apr 2026 | Selesai</p>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Beri Ulasan
        </button>
    </div>

    <!-- ITEM 2 -->
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="font-semibold">Dr. Ihsan</p>
            <p class="text-sm text-gray-500">18 Apr 2026 | Selesai</p>
        </div>
        <span class="text-yellow-500 font-semibold">
            ⭐⭐⭐⭐
        </span>
    </div>

    <!-- ITEM 3 -->
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="font-semibold">Dr. Dini</p>
            <p class="text-sm text-gray-500">15 Apr 2026 | Menunggu</p>
        </div>
        <span class="text-gray-400">
            Menunggu
        </span>
    </div>

</div>

@endsection