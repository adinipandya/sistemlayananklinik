@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Detail Rekam Medis
        </h1>

        <p class="text-slate-500 mt-2">
            Informasi lengkap hasil pemeriksaan pasien
        </p>

    </div>

</div>

<!-- IDENTITAS -->
<div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

    <div class="flex items-center gap-5">

        <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center">

            <i data-feather="user" class="w-8 h-8 text-blue-600">
            </i>

        </div>

        <div>

            <h2 class="text-2xl font-bold">
                {{ $rekamMedis->jadwal->pasien->name }}
            </h2>

            <p class="text-slate-500">
                {{ $rekamMedis->jadwal->pasien->no_rm }}
            </p>

        </div>

    </div>

    <div class="grid md:grid-cols-4 gap-6 mt-8">

        <div>

            <p class="text-sm text-slate-500">
                Umur
            </p>

            <p class="font-semibold mt-1">
                {{ \Carbon\Carbon::parse($rekamMedis->jadwal->pasien->tanggal_lahir)->age }} Tahun
            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Jenis Kelamin
            </p>

            <p class="font-semibold mt-1">
                {{ $rekamMedis->jadwal->pasien->jenis_kelamin }}
            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Dokter
            </p>

            <p class="font-semibold mt-1">
                Dr. {{ $rekamMedis->jadwal->dokter->nama }}
            </p>

        </div>

        <div>

            <p class="text-sm text-slate-500">
                Tanggal Pemeriksaan
            </p>

            <p class="font-semibold mt-1">
                {{ $rekamMedis->created_at->format('d F Y') }}
            </p>

        </div>

    </div>

</div>

<!-- PEMERIKSAAN -->
<div class="grid lg:grid-cols-4 gap-6 mb-6">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Tekanan Darah
        </p>

        <h2 class="text-2xl font-bold mt-2">
            {{ $rekamMedis->tekanan_darah }}
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Suhu
        </p>

        <h2 class="text-2xl font-bold mt-2">
            {{ $rekamMedis->suhu_tubuh }}°C
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Berat Badan
        </p>

        <h2 class="text-2xl font-bold mt-2">
            {{ $rekamMedis->berat_badan }} Kg
        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <p class="text-slate-500 text-sm">
            Tinggi Badan
        </p>

        <h2 class="text-2xl font-bold mt-2">
            {{ $rekamMedis->tinggi_badan }} Cm
        </h2>

    </div>

</div>

<!-- KONTEN -->
<!-- DETAIL REKAM -->
<div class="bg-white rounded-3xl shadow-sm p-8">

    <!-- Keluhan -->
    <div class="pb-8 border-b border-slate-200">

        <h3 class="text-lg font-bold text-slate-800 mb-4">
            Keluhan Utama
        </h3>

        <p class="text-slate-700 leading-7">
            {{ $rekamMedis->jadwal->keluhan }}
        </p>

    </div>


    <!-- Pemeriksaan Fisik -->
    <div class="py-8 border-b border-slate-200">

        <h3 class="text-lg font-bold text-slate-800 mb-5">
            
        Pemeriksaan Fisik
        </h3>

        <div class="grid md:grid-cols-4 gap-4">

            <div>
                <p class="text-sm text-slate-500">
                    Tekanan Darah
                </p>

                <p class="font-semibold text-lg">
                    {{ $rekamMedis->tekanan_darah ?? '-' }}
                </p>
            </div>


            <div>
                <p class="text-sm text-slate-500">
                    Suhu Tubuh
                </p>

                <p class="font-semibold text-lg">
                    {{ $rekamMedis->suhu_tubuh ?? '-' }} °C
                </p>
            </div>


            <div>
                <p class="text-sm text-slate-500">
                    Berat Badan
                </p>

                <p class="font-semibold text-lg">
                    {{ $rekamMedis->berat_badan ?? '-' }} Kg
                </p>
            </div>


            <div>
                <p class="text-sm text-slate-500">
                    Tinggi Badan
                </p>

                <p class="font-semibold text-lg">
                    {{ $rekamMedis->tinggi_badan ?? '-' }} Cm
                </p>
            </div>

        </div>

    </div>


    <!-- Diagnosis -->
    <div class="py-8 border-b border-slate-200">

        <h3 class="text-lg font-bold text-slate-800 mb-4">
            Diagnosis
        </h3>

        <p class="text-slate-700 leading-7">
            {{ $rekamMedis->diagnosa }}
        </p>

    </div>


    <!-- Tindakan -->
    <div class="py-8 border-b border-slate-200">

        <h3 class="text-lg font-bold text-slate-800 mb-4">
            Tindakan Medis
        </h3>

        <p class="text-slate-700 leading-7">
            {{ $rekamMedis->tindakan }}
        </p>

    </div>


    <!-- Resep -->
    <div class="py-8 border-b border-slate-200">

        <h3 class="text-lg font-bold text-slate-800 mb-5">
            Resep Obat
        </h3>

        @forelse($rekamMedis->resepObat as $resep)

        <div class="border border-slate-200 rounded-2xl p-5 mb-4">

            <h4 class="font-semibold text-slate-800">
                {{ $resep->nama_obat }}
            </h4>

            <div class="flex gap-8 mt-3 text-sm text-slate-600">

                <span>
                    Jumlah:
                    <b>{{ $resep->jumlah }}</b>
                </span>

                <span>
                    {{ $resep->aturan_pakai }}
                </span>

            </div>

        </div>

        @empty

        <div class="text-slate-500">

            Tidak ada resep obat

        </div>

        @endforelse

    </div>


    <!-- Catatan -->
    <div class="pt-8">

        <h3 class="text-lg font-bold text-slate-800 mb-4">
            Catatan Dokter
        </h3>

        <p class="text-slate-700 leading-7">
            {{ $rekamMedis->catatan ?? '-' }}
        </p>

    </div>

</div>

<!-- FOOTER ACTION -->
<div class="flex justify-end gap-3 mt-8">

    <div class="flex justify-end gap-3 mt-8">

        <a href="/dokter/kelola" class="border px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="arrow-left" class="w-4 h-4"></i>

        </a>

        <a href="{{ route('rekam-medis.edit', $rekamMedis->id) }}"
            class="bg-yellow-500 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="edit-2" class="w-4 h-4"></i>

        </a>

        <a href="{{ route('rekam-medis.print', $rekamMedis->id) }}"
            class="bg-blue-600 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="printer" class="w-4 h-4"></i>

        </a>

        <button onclick="confirm('Yakin ingin menghapus rekam medis ini?')"
            class="bg-red-500 text-white px-5 py-3 rounded-2xl flex items-center gap-2">

            <i data-feather="trash-2" class="w-4 h-4"></i>

        </button>

    </div>

</div>

@endsection