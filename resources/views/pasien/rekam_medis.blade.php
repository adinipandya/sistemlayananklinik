@extends('layouts.pasien')

@section('content')

<div class="mb-8">


<h1 class="text-3xl font-bold text-slate-800">
    Rekam Medis
</h1>

<p class="text-slate-500 mt-1">
    Riwayat pemeriksaan dan konsultasi pasien
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
        Menunggu Hasil
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
        Riwayat Rekam Medis
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>

            <th class="text-left p-4">
                Tanggal
            </th>

            <th class="text-left p-4">
                Dokter
            </th>

            <th class="text-left p-4">
                Diagnosa
            </th>

            <th class="text-left p-4">
                Status
            </th>

            <th class="text-left p-4">
                Aksi
            </th>

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
                Flu & Batuk
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
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">


<div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl overflow-hidden">

    <div class="border-b p-6">

        <h2 class="text-xl font-semibold">
            Detail Rekam Medis
        </h2>

        <p class="text-sm text-slate-500">
            Informasi hasil pemeriksaan pasien
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
                    Tanggal Pemeriksaan
                </p>

                <p class="font-medium">
                    20 Juni 2026
                </p>

            </div>

        </div>

        <div class="mt-5">

            <p class="text-sm text-slate-500 mb-2">
                Keluhan
            </p>

            <div class="bg-slate-50 border rounded-lg p-4">
                Demam dan batuk selama 3 hari.
            </div>

        </div>

        <div class="mt-5">

            <p class="text-sm text-slate-500 mb-2">
                Diagnosis
            </p>

            <div class="bg-slate-50 border rounded-lg p-4">
                Influenza ringan.
            </div>

        </div>

        <div class="mt-5">

            <p class="text-sm text-slate-500 mb-2">
                Resep Obat
            </p>

            <div class="bg-slate-50 border rounded-lg p-4">
                Paracetamol 500mg, Vitamin C.
            </div>

        </div>

        <div class="flex gap-3 mt-6">

            <button
                onclick="window.print()"
                class="flex-1 bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">

                Download PDF

            </button>

            <button
                onclick="closeDetailModal()"
                class="flex-1 border border-slate-300 py-3 rounded-lg hover:bg-slate-50">

                Tutup

            </button>

        </div>

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
