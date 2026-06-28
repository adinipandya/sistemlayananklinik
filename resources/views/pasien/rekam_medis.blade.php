@extends('layouts.pasien')

@section('content')

<div class="flex items-center gap-4 mb-8"
     data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="file-text"
           class="w-7 h-7 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Riwayat Pemeriksaan
        </h1>

        <p class="text-slate-500">
            Lihat riwayat kunjungan dan status pemeriksaan Anda
        </p>

    </div>

</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Total Pemeriksaan
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        {{ $totalPemeriksaan }}
    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Selesai
    </p>

    <h2 class="text-3xl font-bold text-green-600 mt-2">
        {{ $selesai }}
    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Menunggu Pemeriksaan
    </p>

    <h2 class="text-3xl font-bold text-yellow-500 mt-2">
        {{ $menunggu }}
    </h2>

</div>


</div>

<!-- TABEL -->

<div
data-aos="fade-up"
data-aos-delay="200"
class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Riwayat Pemeriksaan
    </h2>

</div>

<table class="w-full">

   <thead class="bg-green-100 text-green-800">

        <tr>
    <th class="p-4 text-left">Tanggal</th>
<th class="p-4 text-left">Dokter</th>
<th class="p-4 text-left">Poli</th>
<th class="p-4 text-left">Status</th>
<th class="p-4 text-left">Aksi</th>
</tr>

    </thead>

    <tbody>

        @forelse($riwayat as $item)

<tr class="border-t">

    <td class="p-4">
        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
    </td>

    <td class="p-4">
        Dr. {{ $item->dokter->nama }}
    </td>

    <td class="p-4">
        Poli {{ $item->dokter->spesialis }}
    </td>

    <td class="p-4">

        @if($item->status == 'Selesai')

        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
            Selesai
        </span>

        @elseif($item->status == 'Disetujui')

        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
            Disetujui
        </span>

        @else

        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
            Menunggu
        </span>

        @endif

    </td>

    <td class="p-4">

        @if($item->status == 'Selesai')

        <button
class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg">

    Detail

</button>

        @else

        <span class="bg-slate-200 text-slate-600 px-4 py-2 rounded-lg">
            Belum Ada
        </span>

        @endif

    </td>

</tr>

@empty

<tr>
    <td colspan="5" class="p-4 text-center">
        Belum ada riwayat konsultasi
    </td>
</tr>

@endforelse

    </tbody>

</table>


</div>

<!-- MODAL DETAIL -->

<div id="detailModal"
onclick="closeDetailModal()"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <div
    onclick="event.stopPropagation()"
    class="bg-white rounded-2xl shadow-xl w-full max-w-xl overflow-hidden">

        <div class="border-b p-6">

            <h2 class="text-xl font-semibold">
                Detail Kunjungan
            </h2>

            <p class="text-sm text-slate-500">
                Informasi kunjungan pasien
            </p>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">
                        Dokter
                    </p>

                    <p class="font-medium">
                        Dr. Ardi
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Tanggal Kunjungan
                    </p>

                    <p class="font-medium">
                        20 Juni 2026
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Poli
                    </p>

                    <p class="font-medium">
                        Poli Umum
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Status
                    </p>

                    <span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-medium">
                        Selesai
                    </span>
                </div>

            </div>

            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-xl p-4">

                <h3 class="font-medium text-blue-800 mb-2">
                    Informasi
                </h3>

                <p class="text-sm text-blue-700">
                    Detail rekam medis dan resep obat hanya dapat diakses oleh dokter sesuai kebijakan klinik.
                </p>
    
            </div>

            <button
                onclick="closeDetailModal()"
                class="w-full mt-6 border border-slate-300 py-3 rounded-lg hover:bg-slate-50">

                Tutup

            </button>

        </div>

    </div>

</div>

<script>

function openDetailModal() {
    document.getElementById('detailModal').classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

</script>

@endsection
