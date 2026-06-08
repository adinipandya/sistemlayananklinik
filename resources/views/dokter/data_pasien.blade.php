@extends('layouts.dokter')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Data Pasien
    </h1>

    <p class="text-slate-500 mt-1">
        Daftar pasien yang pernah melakukan konsultasi
    </p>

</div>

<!-- SEARCH -->
<form method="GET" action="/dokter/pasien" class="bg-white rounded-2xl shadow-sm border p-5 mb-6">

    <div class="flex gap-3">

        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pasien..."
            class="flex-1 border border-slate-300 rounded-xl p-3">

        <button type="submit" class="bg-blue-600 text-white px-6 rounded-xl hover:bg-blue-700">

            Cari

        </button>

    </div>

</form>

<!-- TABLE -->
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="p-4 text-left">No RM</th>
                <th class="p-4 text-left">Nama</th>
                <th class="p-4 text-left">Umur</th>
                <th class="p-4 text-left">No HP</th>
                <th class="p-4 text-left">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($pasien as $item)

            <tr class="border-t">

                <td class="p-4">
                    RM{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                </td>

                <td class="p-4">
                    {{ $item->name }}
                </td>

                <td class="p-4">
                    21 Tahun
                </td>

                <td class="p-4">
                    08123456789
                </td>

                <td class="p-4">

                    <button onclick="openPatientModal()" class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                        Detail

                    </button>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="5" class="text-center p-6 text-slate-500">

                    Pasien tidak ditemukan

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<!-- MODAL DETAIL PASIEN -->
<div id="patientModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl overflow-hidden">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-blue-500 to-green-400 p-6 text-white">

            <div class="flex justify-between items-center">

                <div>
                    <h2 class="text-2xl font-bold">
                        Detail Pasien
                    </h2>

                    <p class="text-sm opacity-90">
                        Informasi lengkap pasien
                    </p>
                </div>

                <button onclick="closePatientModal()" class="text-2xl font-bold">
                    ×
                </button>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-6">

            <!-- BIODATA -->
            <div class="grid md:grid-cols-2 gap-6 mb-6">

                <div>

                    <h3 class="font-semibold text-slate-700 mb-3">
                        Informasi Pasien
                    </h3>

                    <div class="space-y-2 text-slate-600">

                        <p><b>No RM :</b> RM001</p>
                        <p><b>Nama :</b> Nama Pasien</p>
                        <p><b>Umur :</b> 21 Tahun</p>
                        <p><b>Jenis Kelamin :</b> Laki-Laki</p>
                        <p><b>No HP :</b> 08123456789</p>

                    </div>

                </div>

                <div>

                    <h3 class="font-semibold text-slate-700 mb-3">
                        Informasi Medis
                    </h3>

                    <div class="space-y-2 text-slate-600">

                        <p><b>Golongan Darah :</b> O</p>
                        <p><b>Alergi :</b> Tidak Ada</p>
                        <p><b>Riwayat Penyakit :</b> Asma Ringan</p>
                        <p><b>Total Kunjungan :</b> 8 Kali</p>

                    </div>

                </div>

            </div>

            <!-- RIWAYAT -->
            <div class="mb-6">

                <h3 class="font-semibold text-slate-700 mb-4">
                    Riwayat Pemeriksaan
                </h3>

                <div class="space-y-3">

                    <div class="border rounded-xl p-4">

                        <div class="flex justify-between">

                            <span class="font-medium">
                                Flu & Batuk
                            </span>

                            <span class="text-sm text-slate-500">
                                20 Apr 2026
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-1">
                            Dokter: Dr. Ardi
                        </p>

                    </div>

                    <div class="border rounded-xl p-4">

                        <div class="flex justify-between">

                            <span class="font-medium">
                                Sakit Kepala
                            </span>

                            <span class="text-sm text-slate-500">
                                15 Mar 2026
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-1">
                            Dokter: Dr. Ihsan
                        </p>

                    </div>

                </div>

            </div>

            <!-- ACTION -->
            <div class="flex gap-3">

                <a href="/dokter/kelola"
                    class="flex-1 bg-blue-500 text-white text-center py-3 rounded-xl hover:bg-blue-600">

                    Lihat Rekam Medis

                </a>

                <a href="/dokter/konsultasi?rm=RM001&nama=Ihsan&umur=21"
                    class="flex-1 bg-green-500 text-white text-center py-3 rounded-xl hover:bg-green-600">

                    Mulai Konsultasi

                </a>

            </div>

        </div>

    </div>

</div>

<script>
    function openPatientModal() {
        document
            .getElementById('patientModal')
            .classList.remove('hidden');
    }

    function closePatientModal() {
        document
            .getElementById('patientModal')
            .classList.add('hidden');
    }
</script>

@endsection