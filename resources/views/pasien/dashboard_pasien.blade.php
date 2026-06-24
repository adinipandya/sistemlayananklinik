@extends('layouts.pasien')

@section('content')

<div class="flex items-center gap-4 mb-8"
     data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="home"
           class="w-7 h-7 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Dashboard Pasien
        </h1>

        <p class="text-slate-500">
            Selamat datang, {{ Auth::user()->name }}
        </p>

    </div>

</div>


<!-- ALERT KELENGKAPAN PROFIL -->

@if(
    empty(Auth::user()->nik) ||
    empty(Auth::user()->no_hp) ||
    empty(Auth::user()->tanggal_lahir) ||
    empty(Auth::user()->jenis_kelamin) ||
    empty(Auth::user()->alamat)
)

<div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-lg mb-8">
    <div class="flex items-start justify-between">
        <div>
            <h3 class="font-semibold text-amber-800">
                ⚠ Lengkapi Data Diri
            </h3>

            <p class="text-amber-700 mt-1">
                Data profil Anda belum lengkap. Silakan lengkapi data diri terlebih dahulu agar dapat melakukan booking konsultasi.
            </p>
        </div>

        <a href="/pasien/profile"
           class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg text-sm transition">
            Lengkapi Profil
        </a>
    </div>
</div>

@endif

<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">
    <p class="text-sm text-slate-500">Booking Aktif</p>
    <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $bookingAktif }}</h2>
</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">
    <p class="text-sm text-slate-500">Konsultasi Selesai</p>
    <h2 class="text-3xl font-bold text-green-600 mt-2">{{ $konsultasiSelesai }}</h2>
</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">
    <p class="text-sm text-slate-500">Feedback</p>
    <h2 class="text-3xl font-bold text-green-600 mt-2">{{ $feedbackTotal }}</h2>
</div>


</div>

<!-- QUICK ACTION -->

<div class="grid md:grid-cols-4 gap-5 mb-8">


<a href="/pasien/booking"
    class="bg-blue-600 text-white rounded-2xl p-5
hover:bg-blue-700
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

    <h2 class="font-semibold text-lg">
        Booking Konsultasi
    </h2>

    <p class="text-sm opacity-90 mt-1">
        Buat jadwal konsultasi
    </p>

</a>

<a href="/pasien/jadwal"
    class="bg-green-600 text-white rounded-2xl p-5
hover:bg-green-700
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

    <h2 class="font-semibold text-lg">
        Jadwal Saya
    </h2>

    <p class="text-sm opacity-90 mt-1">
        Lihat jadwal konsultasi
    </p>

</a>

<a href="/pasien/rekam-medis"
    class="bg-white border border-slate-200 rounded-2xl p-5
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

    <h2 class="font-semibold text-lg text-slate-700">
        Riwayat Konsultasi
    </h2>

    <p class="text-sm text-slate-500 mt-1">
        Riwayat kesehatan
    </p>

</a>

<a href="/pasien/feedback"
    class="bg-white border border-slate-200 rounded-2xl p-5
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

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

<div
data-aos="fade-up"
class="bg-white border border-slate-200 rounded-2xl p-6
hover:shadow-xl
transition-all duration-300">
    <h2 class="font-semibold text-lg mb-4">
        Jadwal Konsultasi Berikutnya
    </h2>

    <div class="space-y-2">

        <p><b>Dokter :</b> Dr. {{ $jadwalBerikutnya?->dokter?->nama }}</p>
        <p><b>Tanggal :</b>
{{ $jadwalBerikutnya ? \Carbon\Carbon::parse($jadwalBerikutnya->tanggal)->format('d M Y') : '-' }}
</p>
        <p><b>Jam :</b>
{{ $jadwalBerikutnya ? substr($jadwalBerikutnya->jam,0,5) . ' WIB' : '-' }}
</p>

        <div class="mt-4">

    <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-medium">
        {{ $jadwalBerikutnya?->status ?? '-' }}
    </span>

</div>

    </div>

</div>

<div
data-aos="fade-up"
class="bg-white border border-slate-200 rounded-2xl p-6
hover:shadow-xl
transition-all duration-300">

    <h2 class="font-semibold text-lg mb-4">
    Informasi Klinik
</h2>

<div class="space-y-2">
    <p><b>Jam Operasional :</b> Senin - Jumat, 08.00 - 16.00 WIB</p>
    <p><b>Sabtu :</b> 08.00 - 12.00 WIB</p>
    <p><b>Minggu :</b> Tutup</p>
</div>

</div>


</div>

<!-- RIWAYAT -->

<div
data-aos="fade-up"
class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">


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
<th class="text-left p-4">Jam</th>
<th class="text-left p-4">Status</th>

        </tr>

    </thead>

    <tbody>

@forelse($riwayatTerbaru as $item)

<tr class="border-t">

    <td class="p-4">
        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
    </td>

    <td class="p-4">
        Dr. {{ $item->dokter->nama }}
    </td>

    <td class="p-4">
    {{ substr($item->jam,0,5) }} WIB
</td>

    <td class="p-4">
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
            {{ $item->status }}
        </span>
    </td>

</tr>

@empty

<tr>
    <td colspan="4" class="p-4 text-center">
        Belum ada riwayat konsultasi
    </td>
</tr>

@endforelse

</tbody>

</table>


</div>

@endsection
