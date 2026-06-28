@extends('layouts.pasien')

@section('content')

<div class="mb-8">


<h1 class="text-3xl font-bold text-slate-800">
    Riwayat Pemeriksaan
</h1>

<p class="text-slate-500 mt-1">
    Lihat riwayat kunjungan dan status pemeriksaan Anda
</p>


</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Total Pemeriksaan
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        8
    </h2>

</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Selesai
    </p>

    <h2 class="text-3xl font-bold text-green-600 mt-2">
        7
    </h2>

</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Menunggu Pemeriksaan
    </p>

    <h2 class="text-3xl font-bold text-yellow-500 mt-2">
        1
    </h2>

</div>


</div>

<!-- TABEL -->

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Riwayat Pemeriksaan
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>
    <th class="p-4 text-left">Tanggal</th>
<th class="p-4 text-left">Dokter</th>
<th class="p-4 text-left">Poli</th>
<th class="p-4 text-left">Status</th>
<th class="p-4 text-left">Aksi</th>
</tr>

    </thead>

    <tbody>

        <tr class="border-t">

            <td class="p-4">
                20 Juni 2026
            </td>

            <td class="p-4">
                Dr. Ardi
            </td>

            <td class="p-4">
                Poli Umum
            </td>

            <td class="p-4">

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                    Selesai
                </span>

            </td>

            <td class="p-4">

                <button
                    onclick="openDetailModal()"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                    Detail

                </button>

            </td>

        </tr>

        <tr class="border-t">

            <td class="p-4">
                25 Juni 2026
            </td>

            <td class="p-4">
                Dr. Ihsan
            </td>

            <td class="p-4">
                -
            </td>

            <td class="p-4">

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                    Menunggu
                </span>

            </td>

            <td class="p-4">

                <button
                    class="bg-slate-300 text-slate-600 px-4 py-2 rounded-lg cursor-not-allowed">

                    Belum Ada

                </button>

            </td>

        </tr>

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

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
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
