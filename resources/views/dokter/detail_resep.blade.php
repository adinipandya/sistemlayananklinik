@extends('layouts.dokter')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <h1 class="text-3xl font-bold text-slate-800">
        Detail Resep Obat
    </h1>

    {{-- Informasi Pasien --}}
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-6">
            Informasi Pasien
        </h2>

        <div class="grid md:grid-cols-5 gap-6">

            <div>
                <p class="text-slate-500 text-sm">
                    No Rekam Medis
                </p>

                <p class="font-semibold">
                    {{ $rekamMedis->no_rekam_medis }}
                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Nama Pasien
                </p>

                <p class="font-semibold">
                    {{ $rekamMedis->jadwal->pasien->name }}
                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Dokter
                </p>

                <p class="font-semibold">
                    {{ $rekamMedis->jadwal->dokter->nama ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Tanggal Resep
                </p>

                <p class="font-semibold">
                    {{ $rekamMedis->created_at->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="text-slate-500 text-sm">
                    Diagnosa
                </p>

                <p class="font-semibold">
                    {{ $rekamMedis->diagnosa }}
                </p>
            </div>

        </div>

    </div>

    {{-- Daftar Obat --}}
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-6">
            Daftar Obat
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b">

                        <th class="text-left py-3">
                            No
                        </th>

                        <th class="text-left py-3">
                            Nama Obat
                        </th>

                        <th class="text-left py-3">
                            Jumlah
                        </th>

                        <th class="text-left py-3">
                            Aturan Pakai
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($rekamMedis->resepObat as $resep)

                    <tr class="border-b">

                        <td class="py-3">
                            {{ $loop->iteration }}
                        </td>

                        <td class="py-3 font-medium">
                            {{ $resep->obat->nama_obat }}
                        </td>

                        <td class="py-3">
                            {{ $resep->jumlah }}
                        </td>

                        <td class="py-3">
                            {{ $resep->aturan_pakai }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center py-6 text-slate-500">

                            Tidak ada resep obat

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Catatan Dokter --}}
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <h2 class="text-xl font-bold mb-4">
            Catatan Dokter
        </h2>

        <p class="text-slate-700">
            {{ $rekamMedis->catatan ?? '-' }}
        </p>

    </div>

    <a href="{{ route('resep.index') }}" class="inline-flex items-center text-blue-600 font-medium">

        ← Kembali

    </a>

</div>

@endsection