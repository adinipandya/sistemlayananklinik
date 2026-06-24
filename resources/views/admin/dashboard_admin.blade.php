@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Admin
    </h1>

    <p class="text-slate-500 mt-1">
        Selamat datang, {{ Auth::user()->name }}
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Dokter
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalDokter }}
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Pasien
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            {{ $totalPasien }}
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Jadwal Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalJadwalHariIni }}
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Feedback Masuk
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            {{ $totalFeedback }}
        </h2>

    </div>

</div>

<!-- JADWAL + FEEDBACK -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <!-- JADWAL -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Jadwal Hari Ini
            </h2>

        </div>

        <div class="p-5 space-y-4">

            @forelse($jadwalHariIni as $jadwal)

                <div class="flex justify-between items-center border-b pb-3 last:border-0 last:pb-0">

                    <div>
                        <p class="font-medium text-slate-800">
                            {{ $jadwal->pasien->name ?? 'Pasien' }}
                        </p>
                        <p class="text-sm text-slate-500">
                            {{ $jadwal->dokter->nama ?? 'Dokter' }} &bull; {{ $jadwal->dokter->spesialis ?? '-' }}
                        </p>
                    </div>

                    <div class="text-right">
                        <p class="text-sm font-medium text-blue-600">
                            {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                        </p>
                        @if($jadwal->status == 'Menunggu')
                            <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">Menunggu</span>
                        @elseif($jadwal->status == 'Disetujui')
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">Disetujui</span>
                        @elseif($jadwal->status == 'Selesai')
                            <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Selesai</span>
                        @else
                            <span class="text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full">Dibatalkan</span>
                        @endif
                    </div>

                </div>

            @empty

                <p class="text-slate-500">
                    Belum ada jadwal konsultasi hari ini.
                </p>

            @endforelse

        </div>

    </div>

    <!-- FEEDBACK -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b flex justify-between items-center">

            <h2 class="font-semibold">
                Feedback Terbaru
            </h2>

            <a href="/admin/feedback" class="text-blue-600 text-sm hover:underline">
                Lihat Semua
            </a>

        </div>

        <div class="p-5 space-y-4">

            @forelse($feedbackTerbaru as $item)

                <div class="border-b pb-3">

                    <div class="flex justify-between">

                        <p class="font-medium">
                            {{ $item->user->name ?? 'Pasien' }}
                        </p>

                        <span class="text-yellow-500">
                            {{ str_repeat('⭐', $item->rating) }}
                        </span>

                    </div>

                    <p class="text-sm text-slate-500 mt-1">
                        {{ \Illuminate\Support\Str::limit($item->komentar, 50) }}
                    </p>

                </div>

            @empty

                <p class="text-slate-500">
                    Belum ada feedback.
                </p>

            @endforelse

        </div>

    </div>

</div>

<!-- MENUNGGU RESPON -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-8">

    <p class="text-sm text-slate-500">
        Feedback Menunggu Respon
    </p>

    <h2 class="text-3xl font-bold text-red-500 mt-2">
        {{ $feedbackMenunggu }}
    </h2>

</div>

<!-- DOKTER + PASIEN -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <!-- DOKTER -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Dokter Terbaru
            </h2>

        </div>

        <div class="p-5 space-y-3">

            @forelse($dokterTerbaru as $dokter)

                <div class="flex justify-between">

                    <span>{{ $dokter->nama }}</span>

                    <span class="text-green-600 text-sm">
                        {{ $dokter->status }}
                    </span>

                </div>

            @empty

                <p class="text-slate-500">
                    Belum ada data dokter.
                </p>

            @endforelse

        </div>

    </div>

    <!-- PASIEN -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Pasien Terbaru
            </h2>

        </div>

        <div class="p-5 space-y-3">

            @forelse($pasienTerbaru as $pasien)

                <div class="flex justify-between">

                    <span>{{ $pasien->name }}</span>

                    <span class="text-slate-500 text-sm">
                        {{ $pasien->status }}
                    </span>

                </div>

            @empty

                <p class="text-slate-500">
                    Belum ada data pasien.
                </p>

            @endforelse

        </div>

    </div>

</div>

<!-- PASIEN MENUNGGU VERIFIKASI -->
@if($pasienMenungguVerifikasi->count() > 0)
<div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 mb-8">

    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-semibold text-yellow-800">⚠️ Pasien Menunggu Verifikasi</h2>
            <p class="text-sm text-yellow-600">Pasien berikut belum diverifikasi akunnya</p>
        </div>
        <a href="/admin/pasien" class="text-yellow-700 text-sm hover:underline font-medium">Kelola Pasien →</a>
    </div>

    <div class="space-y-2">
        @foreach($pasienMenungguVerifikasi as $p)
        <div class="flex justify-between items-center bg-white border border-yellow-200 rounded-lg px-4 py-2">
            <span class="text-slate-700 font-medium">{{ $p->name }}</span>
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-500">{{ $p->created_at->diffForHumans() }}</span>
                <form action="/admin/pasien/{{ $p->id }}/verifikasi" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg">
                        Verifikasi
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endif

<!-- AKTIVITAS -->
<div class="bg-white border border-slate-200 rounded-xl">

    <div class="p-5 border-b">

        <h2 class="font-semibold">
            Aktivitas Sistem
        </h2>

    </div>

    <div class="p-5 space-y-3">

        @forelse($aktivitasSistem as $aktivitas)

            <div class="flex items-start gap-3 border-b pb-3 last:border-0 last:pb-0">

                @if(str_contains($aktivitas->judul, 'Pasien') || str_contains($aktivitas->judul, 'Registrasi'))
                    <div class="w-2 h-2 rounded-full bg-blue-500 mt-2 shrink-0"></div>
                @elseif(str_contains($aktivitas->judul, 'Konsultasi') || str_contains($aktivitas->judul, 'Jadwal') || str_contains($aktivitas->judul, 'Booking'))
                    <div class="w-2 h-2 rounded-full bg-green-500 mt-2 shrink-0"></div>
                @elseif(str_contains($aktivitas->judul, 'Feedback'))
                    <div class="w-2 h-2 rounded-full bg-yellow-500 mt-2 shrink-0"></div>
                @else
                    <div class="w-2 h-2 rounded-full bg-slate-400 mt-2 shrink-0"></div>
                @endif

                <div class="flex-1">
                    <p class="text-sm font-medium text-slate-700">{{ $aktivitas->judul }}</p>
                    <p class="text-sm text-slate-500">{{ $aktivitas->pesan }}</p>
                    <p class="text-xs text-slate-400 mt-1">{{ $aktivitas->created_at->diffForHumans() }}</p>
                </div>

            </div>

        @empty

            <p class="text-slate-500 text-sm">Belum ada aktivitas sistem.</p>

        @endforelse

    </div>

</div>

@endsection