@extends('layouts.pasien')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Detail Jadwal Konsultasi
            </h1>

            <p class="text-slate-500 mt-1">
                Informasi lengkap jadwal konsultasi
            </p>
        </div>

  <a href="{{ route('pasien.jadwal') }}"
   class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition">
    Kembali
</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">

        <div class="grid md:grid-cols-2 gap-8">

            <div>
                <label class="text-sm text-slate-500">
                    Dokter
                </label>

                <p class="font-semibold text-lg">
                    {{ $jadwal->dokter->nama }}
                </p>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Status
                </label>

                <p>
                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                        {{ $jadwal->status }}
                    </span>
                </p>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Tanggal
                </label>

                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('d F Y') }}
                </p>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Jam
                </label>

                <p class="font-semibold">
                    {{ $jadwal->jam }} WIB
                </p>
            </div>

        </div>

        <hr class="my-8">

        <div>
            <h3 class="text-lg font-semibold mb-3">
                Keluhan Pasien
            </h3>

            <div class="bg-slate-50 rounded-xl p-4">
                {{ $jadwal->keluhan ?? 'Tidak ada keluhan' }}
            </div>
        </div>

    </div>

</div>

@endsection