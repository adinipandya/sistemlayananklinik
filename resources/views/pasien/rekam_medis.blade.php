@extends('layouts.pasien')

@section('content')

<div class="flex items-center gap-4 mb-8" data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">
        <i data-feather="file-text" class="w-7 h-7 text-blue-600"></i>
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

    <div data-aos="zoom-in"
        class="bg-white border border-slate-200 rounded-xl p-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">

        <p class="text-sm text-slate-500">
            Total Pemeriksaan
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalPemeriksaan }}
        </h2>

    </div>

    <div data-aos="zoom-in"
        class="bg-white border border-slate-200 rounded-xl p-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">

        <p class="text-sm text-slate-500">
            Selesai
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            {{ $selesai }}
        </h2>

    </div>

    <div data-aos="zoom-in"
        class="bg-white border border-slate-200 rounded-xl p-5 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">

        <p class="text-sm text-slate-500">
            Menunggu Pemeriksaan
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            {{ $menunggu }}
        </h2>

    </div>

</div>

<!-- TABEL -->
<div data-aos="fade-up"
    data-aos-delay="200"
    class="bg-white border border-slate-200 rounded-xl overflow-hidden">

    <div class="p-5 border-b">
        <h2 class="font-semibold text-slate-700">
            Riwayat Pemeriksaan
        </h2>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full min-w-[800px]">

            <thead class="bg-blue-50 text-blue-700">
                <tr>
                    <th class="p-4 text-left">No Antrian</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-left">Jam</th>
                    <th class="p-4 text-left">Dokter</th>
                    <th class="p-4 text-left">Poli</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($riwayat as $item)

                @php
                $tanggal = \Carbon\Carbon::parse($item->tanggal)->format('d M Y');
                $jam = \Carbon\Carbon::parse($item->jam)->format('H:i');

                $namaDokter = $item->dokter->nama ?? '-';
                $spesialis = $item->dokter->spesialis ?? '-';

                $statusClass = match($item->status) {
                'Selesai' => 'bg-green-100 text-green-700',
                'Disetujui' => 'bg-blue-100 text-blue-700',
                'Dibatalkan' => 'bg-red-100 text-red-700',
                default => 'bg-yellow-100 text-yellow-700'
                };

                $detailData = [
                'dokter' => 'Dr. ' . $namaDokter,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'poli' => 'Poli ' . $spesialis,
                'status' => $item->status,
                'keluhan' => $item->keluhan ?? '-',
                'nomor_antrian' => $item->nomor_antrian ?? '-',
                ];
                @endphp

                <tr class="border-t hover:bg-slate-50 transition">

                    <td class="p-4">
                        <span class="font-bold text-blue-600">
                            {{ $item->nomor_antrian ?? '-' }}
                        </span>
                    </td>

                    <td class="p-4">
                        {{ $tanggal }}
                    </td>

                    <td class="p-4">
                        {{ $jam }}
                    </td>

                    <td class="p-4">
                        Dr. {{ $namaDokter }}
                    </td>

                    <td class="p-4">
                        Poli {{ $spesialis }}
                    </td>

                    <td class="p-4">
                        <span class="{{ $statusClass }} px-3 py-1 rounded-full text-sm font-medium">
                            {{ $item->status }}
                        </span>
                    </td>

                    <td class="p-4">

                        <button
                            type="button"
                            onclick="openDetailModal({{ \Illuminate\Support\Js::from($detailData) }})"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 hover:shadow-lg">

                            Detail

                        </button>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="p-8 text-center text-slate-500">
                        Belum ada riwayat konsultasi
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL DETAIL -->
<div id="detailModal"
    onclick="closeDetailModal()"
    class="hidden fixed inset-0 bg-black/50 items-center justify-center z-50 p-4">

    <div onclick="event.stopPropagation()"
        class="bg-white rounded-2xl shadow-xl w-full max-w-xl overflow-hidden">

        <div class="border-b p-6 flex items-start justify-between">

            <div>
                <h2 class="text-xl font-semibold text-slate-800">
                    Detail Kunjungan
                </h2>

                <p class="text-sm text-slate-500">
                    Informasi kunjungan pasien
                </p>
            </div>

            <button onclick="closeDetailModal()"
                class="text-slate-400 hover:text-slate-700">
                ✕
            </button>

        </div>

        <div class="p-6">

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-sm text-slate-500">Dokter</p>
                    <p id="modalDokter" class="font-medium text-slate-800">-</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Tanggal Kunjungan</p>
                    <p id="modalTanggal" class="font-medium text-slate-800">-</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Jam</p>
                    <p id="modalJam" class="font-medium text-slate-800">-</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Nomor Antrian</p>
                    <p id="modalNomorAntrian" class="font-medium text-slate-800">-</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Poli</p>
                    <p id="modalPoli" class="font-medium text-slate-800">-</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Status</p>
                    <span id="modalStatus"
                        class="px-4 py-1 rounded-full text-sm font-medium">
                        -
                    </span>
                </div>

            </div>

            <div class="mt-6">
                <p class="text-sm text-slate-500 mb-1">
                    Keluhan
                </p>

                <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-sm text-slate-700">
                    <p id="modalKeluhan">-</p>
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
                class="w-full mt-6 border border-slate-300 py-3 rounded-lg hover:bg-slate-50 transition">

                Tutup

            </button>

        </div>

    </div>

</div>

<script>
    function openDetailModal(data) {
        document.getElementById('modalDokter').innerText = data.dokter ?? '-';
        document.getElementById('modalTanggal').innerText = data.tanggal ?? '-';
        document.getElementById('modalJam').innerText = data.jam ?? '-';
        document.getElementById('modalNomorAntrian').innerText = data.nomor_antrian ?? '-';
        document.getElementById('modalPoli').innerText = data.poli ?? '-';
        document.getElementById('modalKeluhan').innerText = data.keluhan ?? '-';

        const status = document.getElementById('modalStatus');
        status.innerText = data.status ?? '-';

        status.className = 'px-4 py-1 rounded-full text-sm font-medium';

        if (data.status === 'Selesai') {
            status.classList.add('bg-green-100', 'text-green-700');
        } else if (data.status === 'Disetujui') {
            status.classList.add('bg-blue-100', 'text-blue-700');
        } else if (data.status === 'Dibatalkan') {
            status.classList.add('bg-red-100', 'text-red-700');
        } else {
            status.classList.add('bg-yellow-100', 'text-yellow-700');
        }

        const modal = document.getElementById('detailModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeDetailModal() {
        const modal = document.getElementById('detailModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>

@endsection