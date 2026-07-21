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

    @elseif($item->status == 'Dibatalkan')

        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
            Dibatalkan
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
    onclick="openDetailModal(this)"
    data-dokter="Dr. {{ $item->dokter->nama }}"
    data-poli="Poli {{ $item->dokter->spesialis }}"
    data-tanggal="{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}"
    data-status="{{ $item->status }}"
    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
    Detail
</button>

    @elseif($item->status == 'Dibatalkan')

        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm">
            Dibatalkan
        </span>

    @else

        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-lg text-sm">
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

                    <p id="modalDokter" class="font-medium"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Tanggal Kunjungan
                    </p>

                    <p id="modalTanggal" class="font-medium"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Poli
                    </p>

                    <p id="modalPoli" class="font-medium"></p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">
                        Status
                    </p>

                    <span id="modalStatus"
      class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-medium">
</span>
                </div>

            </div>

           <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-4">

    <h3 class="font-medium text-green-800 mb-2">
        Pemeriksaan Selesai
    </h3>

    <p class="text-sm text-green-700 leading-relaxed">
        Pemeriksaan Anda telah selesai. Silakan mengikuti anjuran dan tindak lanjut yang telah diberikan oleh dokter selama konsultasi.
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

function openDetailModal(button){

    document.getElementById('modalDokter').innerText =
        button.dataset.dokter;

    document.getElementById('modalTanggal').innerText =
        button.dataset.tanggal;

    document.getElementById('modalPoli').innerText =
        button.dataset.poli;

    document.getElementById('modalStatus').innerText =
        button.dataset.status;

    document.getElementById('detailModal').classList.remove('hidden');
}
function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

</script>

@endsection