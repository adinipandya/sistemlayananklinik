@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Edit Rekam Medis
        </h1>

        <p class="text-slate-500 mt-2">
            Perbarui hasil pemeriksaan dan tindakan medis pasien
        </p>

    </div>

</div>

<form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">

    @csrf
    @method('PUT')

    <!-- IDENTITAS -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-6">
            Informasi Pasien
        </h2>

        <div class="grid md:grid-cols-4 gap-5">

            <div>

                <label class="text-sm text-slate-500">
                    No Rekam Medis
                </label>

                <input value="{{ $rekamMedis->jadwal->pasien->no_rm }}" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Nama Pasien
                </label>

                <input value="{{ $rekamMedis->jadwal->pasien->name }}" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Umur
                </label>

                <input value="{{ \Carbon\Carbon::parse($rekamMedis->jadwal->pasien->tanggal_lahir)->age }} Tahun"
                    readonly class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Tanggal
                </label>

                <input value="{{ $rekamMedis->created_at->format('d F Y') }}" readonly
                    class="w-full mt-2 bg-slate-100 border rounded-2xl p-3">

            </div>

        </div>

    </div>

    <!-- PEMERIKSAAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-6">
            Pemeriksaan Fisik
        </h2>

        <div class="grid md:grid-cols-4 gap-5">

            <div>

                <label class="text-sm text-slate-500">
                    Tekanan Darah
                </label>

                <input type="text" name="tekanan_darah" value="{{ $rekamMedis->tekanan_darah }}"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Suhu Tubuh
                </label>

                <input type="text" name="suhu_tubuh" value="{{ $rekamMedis->suhu_tubuh }}"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Berat Badan
                </label>

                <input type="text" name="berat_badan" value="{{ $rekamMedis->berat_badan }}"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

            <div>

                <label class="text-sm text-slate-500">
                    Tinggi Badan
                </label>

                <input type="text" name="tinggi_badan" value="{{ $rekamMedis->tinggi_badan }}"
                    class="w-full mt-2 border rounded-2xl p-3">

            </div>

        </div>

    </div>

    <!-- KELUHAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Keluhan Utama
        </h2>

        <textarea name="keluhan" rows="4"
            class="w-full border rounded-2xl p-4">{{ $rekamMedis->jadwal->keluhan }}</textarea>

    </div>

    <!-- DIAGNOSA -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Diagnosis
        </h2>

        <textarea name="diagnosa" rows="5" class="w-full border rounded-2xl p-4">{{ $rekamMedis->diagnosa }}</textarea>

    </div>

    <!-- TINDAKAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Tindakan Medis
        </h2>

        <textarea name="tindakan" rows="4" class="w-full border rounded-2xl p-4">{{ $rekamMedis->tindakan }}</textarea>

    </div>

    <!-- RESEP -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="font-bold text-xl">
                Resep Obat
            </h2>

            <button type="button" onclick="tambahObat()" class="bg-blue-600 text-white px-4 py-2 rounded-xl">

                + Tambah Obat

            </button>

        </div>

        <div id="obatContainer">

            @forelse($rekamMedis->resepObat as $resep)

            <div class="grid md:grid-cols-4 gap-4 items-end mb-4 obat-row">

                <input
                    type="text"
                    name="nama_obat[]"
                    value="{{ $resep->nama_obat }}"
                    placeholder="Nama Obat"
                    class="rounded-xl p-3 border">

                <input
                    type="text"
                    name="jumlah[]"
                    value="{{ $resep->jumlah }}"
                    placeholder="Jumlah / Dosis"
                    class="rounded-xl p-3 border">

                <input
                    type="text"
                    name="aturan_pakai[]"
                    value="{{ $resep->aturan_pakai }}"
                    placeholder="Aturan Pakai"
                    class="rounded-xl p-3 border">

                <div class="flex justify-end">
                    <button type="button" onclick="hapusObat(this)"
                        class="text-red-500 hover:text-red-700 border border-red-300 hover:border-red-500 rounded-xl px-4 py-2 text-sm flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>

            </div>

            @empty

            <div class="grid md:grid-cols-4 gap-4 mb-4">

                <input
                    type="text"
                    name="nama_obat[]"
                    placeholder="Nama Obat"
                    class="border rounded-2xl p-3">

                <input
                    type="text"
                    name="jumlah[]"
                    placeholder="Jumlah / Dosis"
                    class="border rounded-2xl p-3">

                <input
                    type="text"
                    name="aturan_pakai[]"
                    placeholder="Aturan Pakai"
                    class="border rounded-2xl p-3">

                <div class="flex justify-end">
                    <button type="button" onclick="hapusObat(this)"
                        class="text-red-500 hover:text-red-700 border border-red-300 hover:border-red-500 rounded-xl px-4 py-2 text-sm flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>

            </div>

            @endforelse

        </div>

    </div>

    <!-- CATATAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-8">

        <h2 class="font-bold text-xl mb-4">
            Catatan Dokter
        </h2>

        <textarea name="catatan" rows="4" class="w-full border rounded-2xl p-4">{{ $rekamMedis->catatan }}</textarea>

    </div>

    <!-- BUTTON -->
    <div class="flex justify-end gap-3">

        <a href="{{ route('rekam-medis.detail', $rekamMedis->id) }}" class="border px-6 py-3 rounded-2xl">

            Batal

        </a>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl">

            Simpan Perubahan

        </button>

    </div>

</form>

<script>
    function tambahObat() {
        let html = `
    <div class="grid md:grid-cols-4 gap-4 items-end mb-4 obat-row">

        <input
            type="text"
            name="nama_obat[]"
            placeholder="Nama Obat"
            class="rounded-xl p-3 border">

        <input
            type="text"
            name="jumlah[]"
            placeholder="Jumlah / Dosis"
            class="rounded-xl p-3 border">

        <input
            type="text"
            name="aturan_pakai[]"
            placeholder="Aturan Pakai"
            class="rounded-xl p-3 border">

        <div class="flex justify-end">
            <button
                type="button"
                onclick="hapusObat(this)"
                class="text-red-500 hover:text-red-700 border border-red-300 rounded-xl px-4 py-2">

                Hapus

            </button>
        </div>

    </div>
    `;

        document
            .getElementById('obatContainer')
            .insertAdjacentHTML('beforeend', html);
    }

    function hapusObat(btn) {
        const row = btn.closest('.obat-row');
        const container = document.getElementById('obatContainer');
        if (container.children.length <= 1) {
            alert('Minimal harus ada satu baris obat.');
            return;
        }
        row.remove();
    }
</script>

@endsection