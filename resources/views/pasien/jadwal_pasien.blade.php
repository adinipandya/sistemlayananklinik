@extends('layouts.pasien')

@section('content')

<div class="mb-8">


<h1 class="text-3xl font-bold text-slate-800">
    Jadwal Konsultasi
</h1>

<p class="text-slate-500 mt-1">
    Kelola jadwal konsultasi Anda
</p>


</div>

<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Jadwal Aktif
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        1
    </h2>

</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Konsultasi Selesai
    </p>

    <h2 class="text-3xl font-bold text-green-600 mt-2">
        8
    </h2>

</div>

<div class="bg-white border border-slate-200 rounded-xl p-5">

    <p class="text-sm text-slate-500">
        Total Booking
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        9
    </h2>

</div>


</div>

<!-- JADWAL BERIKUTNYA -->

<div class="bg-white border border-slate-200 rounded-xl p-6 mb-8">


<h2 class="font-semibold text-lg mb-4">
    Jadwal Terdekat
</h2>

<div class="grid md:grid-cols-4 gap-4">

    <div>
        <p class="text-sm text-slate-500">
            Dokter
        </p>
        <p class="font-medium">
            Dr. Ihsan
        </p>
    </div>

    <div>
        <p class="text-sm text-slate-500">
            Tanggal
        </p>
        <p class="font-medium">
            25 Juni 2026
        </p>
    </div>

    <div>
        <p class="text-sm text-slate-500">
            Jam
        </p>
        <p class="font-medium">
            10.00 WIB
        </p>
    </div>

    <div>
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
            Menunggu
        </span>
    </div>

</div>


</div>

<!-- TABEL -->

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Daftar Jadwal Konsultasi
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>

            <th class="text-left p-4">
                Dokter
            </th>

            <th class="text-left p-4">
                Tanggal
            </th>

            <th class="text-left p-4">
                Jam
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
                Dr. Ihsan
            </td>

            <td class="p-4">
                25 Juni 2026
            </td>

            <td class="p-4">
                10.00 WIB
            </td>

            <td class="p-4">

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                    Menunggu
                </span>

            </td>

            <td class="p-4 flex gap-2">

                <button
                    onclick="openDetailModal()"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">

                    Detail

                </button>

                <button
                    onclick="openCancelModal()"
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">

                    Batalkan

                </button>

            </td>

        </tr>

        <tr class="border-t">

            <td class="p-4">
                Dr. Ardi
            </td>

            <td class="p-4">
                20 Juni 2026
            </td>

            <td class="p-4">
                08.00 WIB
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

    </tbody>

</table>


</div>

<!-- MODAL DETAIL -->

<div id="detailModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


<div class="bg-white rounded-2xl p-6 w-full max-w-lg">

    <h2 class="text-xl font-semibold mb-4">
        Detail Konsultasi
    </h2>

    <div class="space-y-3">

        <p><b>Dokter :</b> Dr. Ihsan</p>
        <p><b>Tanggal :</b> 25 Juni 2026</p>
        <p><b>Jam :</b> 10.00 WIB</p>
        <p><b>Status :</b> Menunggu</p>

    </div>

    <button
        onclick="closeDetailModal()"
        class="mt-6 w-full border border-slate-300 py-3 rounded-lg">

        Tutup

    </button>

</div>


</div>

<!-- MODAL BATAL -->

<div id="cancelModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


<div class="bg-white rounded-2xl p-6 w-full max-w-md text-center">

    <h2 class="text-xl font-bold mb-2">
        Batalkan Jadwal?
    </h2>

    <p class="text-slate-500 mb-6">
        Jadwal konsultasi yang dibatalkan tidak dapat dikembalikan.
    </p>

    <div class="flex gap-3">

        <button
            onclick="closeCancelModal()"
            class="flex-1 border border-slate-300 py-3 rounded-lg">

            Kembali

        </button>

        <button
            onclick="closeCancelModal()"
            class="flex-1 bg-red-500 text-white py-3 rounded-lg">

            Ya, Batalkan

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

function openCancelModal() {
    document.getElementById('cancelModal').classList.remove('hidden');
}

function closeCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
}

</script>

@endsection
