@extends('layouts.pasien')

@section('content')

<!-- STATISTIK -->
<div class="flex items-center gap-4 mb-8" data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">
        <i data-feather="calendar" class="w-7 h-7 text-blue-600"></i>
    </div>

    <div>
        <h1 class="text-4xl font-bold text-slate-800">
            Booking Konsultasi
        </h1>
        <p class="text-slate-500">
            Pilih dokter terlebih dahulu untuk membuat jadwal konsultasi
        </p>
    </div>

</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    {{ session('error') }}
</div>
@endif

<!-- RINGKASAN -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Booking Aktif</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $bookingAktif }}
        </h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Konsultasi Selesai</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">
            {{ $totalKonsultasi }}
        </h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Dokter Tersedia</p>
        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            {{ $dokterTersedia }}
        </h2>
    </div>

</div>

<!-- DOKTER -->
<h2 class="font-bold text-lg mb-4">Pilih Dokter</h2>

<div class="grid md:grid-cols-3 gap-6 mb-10">

    @forelse($dokters as $dokter)

    <div data-aos="fade-up"
        class="bg-white border border-slate-200 rounded-2xl p-5 text-center
        hover:-translate-y-2 hover:shadow-xl transition-all duration-300">

        <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">
            <i data-feather="user" class="text-blue-600 w-12 h-12"></i>
        </div>

        <h2 class="font-bold text-lg mt-4">
            Dr. {{ $dokter->nama }}
        </h2>

        <div class="mt-2 flex justify-center gap-2 flex-wrap">

            @if($dokter->tersedia)
                <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">
                    Tersedia
                </span>
            @else
                <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs">
                    Tidak Praktik
                </span>
            @endif

            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs">
                {{ $dokter->spesialis }}
            </span>

        </div>

        <p class="text-sm text-slate-400 mt-2">
            {{ $dokter->hari_praktek }}
        </p>

        <p class="text-sm text-slate-400">
            {{ $dokter->jam_praktek }}
        </p>

        @if($dokter->tersedia)
            <a href="{{ route('booking.dokter', $dokter->id) }}"
                class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">
                Pilih Dokter
            </a>
        @else
            <button disabled
                class="mt-5 bg-slate-300 text-slate-500 px-5 py-2 rounded-lg cursor-not-allowed">
                Tidak Tersedia
            </button>
        @endif

    </div>

    @empty
    <p class="text-slate-500 col-span-3 text-center py-6">
        Belum ada data dokter aktif.
    </p>
    @endforelse

</div>

<!-- RIWAYAT BOOKING -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden" data-aos="fade-up">

    <div class="p-5 border-b border-slate-200">
        <h2 class="font-bold text-lg">Riwayat Booking</h2>
    </div>

    <table class="w-full">

        <thead class="bg-slate-50">
            <tr>
                <th class="text-left p-4">Tanggal</th>
                <th class="text-left p-4">Dokter</th>
                <th class="text-left p-4">Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($riwayat as $item)
            <tr class="border-t">
                <td class="p-4">{{ $item->tanggal }}</td>
                <td class="p-4">Dr. {{ $item->dokter->nama ?? '-' }}</td>
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-sm
                        @if($item->status == 'Selesai') bg-green-100 text-green-600
                        @elseif($item->status == 'Disetujui') bg-blue-100 text-blue-600
                        @elseif($item->status == 'Dibatalkan') bg-red-100 text-red-600
                        @else bg-yellow-100 text-yellow-600
                        @endif">
                        {{ $item->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-4 text-center text-slate-500">
                    Belum ada booking
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection