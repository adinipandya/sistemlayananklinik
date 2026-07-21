@extends('layouts.dokter')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">

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

    <!-- KELUHAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-4">
            Keluhan Utama
        </h2>

        <textarea name="keluhan" rows="4"
            class="w-full border rounded-2xl p-4">{{ $rekamMedis->jadwal->keluhan }}</textarea>

    </div>

    <!-- PEMERIKSAAN -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-6">

        <h2 class="font-bold text-xl mb-6">
            Pemeriksaan Fisik
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

            <div>
                <label class="text-sm text-slate-500">
                    Tekanan Darah
                </label>

                <input
                    type="text"
                    name="tekanan_darah"
                    value="{{ old('tekanan_darah', $rekamMedis->tekanan_darah) }}"
                    placeholder="Contoh: 120/80"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Suhu Tubuh
                </label>

                <input
                    type="text"
                    name="suhu_tubuh"
                    value="{{ old('suhu_tubuh', $rekamMedis->suhu_tubuh) }}"
                    placeholder="Contoh: 36.5"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Berat Badan
                </label>

                <input
                    type="text"
                    name="berat_badan"
                    value="{{ old('berat_badan', $rekamMedis->berat_badan) }}"
                    placeholder="Contoh: 65"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Tinggi Badan
                </label>

                <input
                    type="text"
                    name="tinggi_badan"
                    value="{{ old('tinggi_badan', $rekamMedis->tinggi_badan) }}"
                    placeholder="Contoh: 170"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Nadi
                </label>

                <input
                    type="text"
                    name="nadi"
                    value="{{ old('nadi', $rekamMedis->nadi) }}"
                    placeholder="Contoh: 80"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Respirasi
                </label>

                <input
                    type="text"
                    name="respirasi"
                    value="{{ old('respirasi', $rekamMedis->respirasi) }}"
                    placeholder="Contoh: 20"
                    class="w-full mt-2 border rounded-2xl p-3">
            </div>

        </div>

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

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h2 class="font-bold text-xl">
                    Resep Obat
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui daftar resep obat pasien
                </p>
            </div>

            <button
                type="button"
                onclick="openResepModal()"
                class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl text-sm font-medium flex items-center justify-center gap-2">

                <span class="text-lg leading-none">+</span>
                Tambah Resep

            </button>

        </div>

        <div id="obatContainer" class="space-y-4">

            @forelse($rekamMedis->resepObat as $resep)

            <div class="obat-row border border-slate-200 rounded-2xl p-5 bg-slate-50/60">

                <input type="hidden" name="nama_obat[]" value="{{ $resep->nama_obat }}">
                <input type="hidden" name="jumlah[]" value="{{ $resep->jumlah }}">
                <input type="hidden" name="aturan_pakai[]" value="{{ $resep->aturan_pakai }}">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>
                        <h4 class="obat-nama font-bold text-slate-800 text-lg">
                            {{ $resep->nama_obat }}
                        </h4>

                        <div class="flex flex-wrap gap-x-6 gap-y-2 mt-2 text-sm text-slate-600">

                            <span>
                                <b>Jumlah / Dosis</b>
                                <span class="obat-jumlah">{{ $resep->jumlah ?: '-' }}</span>
                            </span>

                            <span>
                                <b>Aturan Pakai</b>
                                <span class="obat-aturan">{{ $resep->aturan_pakai ?: '-' }}</span>
                            </span>

                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-sm">

                        <button
                            type="button"
                            onclick="openResepModal(this.closest('.obat-row'))"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-600 hover:text-white transition">

                            <i data-feather="edit-2" class="w-4 h-4"></i>
                            Ubah

                        </button>

                        <button
                            type="button"
                            onclick="confirmHapusResep(this)"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">

                            <i data-feather="trash-2" class="w-4 h-4"></i>
                            Hapus

                        </button>

                    </div>

                </div>

            </div>

            @empty

            <div class="obat-row border border-slate-200 rounded-2xl p-5 bg-slate-50/60">

                <input type="hidden" name="nama_obat[]" value="">
                <input type="hidden" name="jumlah[]" value="">
                <input type="hidden" name="aturan_pakai[]" value="">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>
                        <h4 class="obat-nama font-bold text-slate-800 text-lg">
                            Belum ada nama obat
                        </h4>

                        <div class="flex flex-wrap gap-x-6 gap-y-2 mt-2 text-sm text-slate-600">

                            <span>
                                <b>Jumlah / Dosis</b>
                                <span class="obat-jumlah">-</span>
                            </span>

                            <span>
                                <b>Aturan Pakai</b>
                                <span class="obat-aturan">-</span>
                            </span>

                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-sm">

                        <button
                            type="button"
                            onclick="openResepModal(this.closest('.obat-row'))"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-600 hover:text-white transition">

                            <i data-feather="edit-2" class="w-4 h-4"></i>
                            Ubah

                        </button>

                        <button
                            type="button"
                            onclick="confirmHapusResep(this)"
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">

                            <i data-feather="trash-2" class="w-4 h-4"></i>
                            Hapus

                        </button>

                    </div>

                </div>

            </div>

            @endforelse

        </div>

    </div>

    <!-- MODAL RESEP -->
    <div
        id="resepModal"
        onclick="closeResepModal()"
        class="hidden fixed inset-0 bg-black/50 z-[999] items-center justify-center p-4">

        <div
            onclick="event.stopPropagation()"
            class="bg-white rounded-3xl w-full max-w-xl overflow-hidden shadow-xl">

            <div class="bg-blue-600 text-white p-6 flex items-start justify-between">

                <div>
                    <p class="text-xs tracking-widest uppercase text-blue-100">
                        Resep Obat
                    </p>

                    <h3 id="resepModalTitle" class="text-xl font-bold mt-1">
                        Tambah Resep
                    </h3>
                </div>

                <button
                    type="button"
                    onclick="closeResepModal()"
                    class="w-9 h-9 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center">
                    ×
                </button>

            </div>

            <div class="p-6 space-y-4">

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Nama Obat
                    </label>

                    <input
                        id="modalNamaObat"
                        type="text"
                        placeholder="Contoh: Paracetamol 500mg"
                        class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Jumlah / Dosis
                    </label>

                    <input
                        id="modalJumlah"
                        type="text"
                        placeholder="Contoh: 3 x 1 tablet / 15 tablet"
                        class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">
                        Aturan Pakai
                    </label>

                    <textarea
                        id="modalAturan"
                        rows="3"
                        placeholder="Contoh: Diminum setelah makan"
                        class="w-full border border-slate-200 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                </div>

            </div>

            <div class="p-6 border-t flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeResepModal()"
                    class="px-5 py-3 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-50">
                    Batal
                </button>

                <button
                    type="button"
                    onclick="saveResep()"
                    class="px-5 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700">
                    Simpan Resep
                </button>

            </div>

        </div>

    </div>

    <!-- MODAL KONFIRMASI HAPUS RESEP -->
    <div
        id="deleteResepModal"
        onclick="closeDeleteResepModal()"
        class="hidden fixed inset-0 bg-black/50 z-[9999] items-center justify-center p-4">

        <div
            onclick="event.stopPropagation()"
            class="bg-white rounded-3xl w-full max-w-md overflow-hidden shadow-2xl">

            <div class="p-6 text-center">

                <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">

                    <i data-feather="alert-triangle" class="w-8 h-8 text-red-600"></i>

                </div>

                <h3 class="text-xl font-bold text-slate-800">
                    Hapus Resep Obat?
                </h3>

                <p class="text-slate-500 text-sm mt-2 leading-6">
                    Data resep yang dipilih akan dihapus dari daftar. Tindakan ini belum tersimpan permanen sampai kamu menekan tombol simpan rekam medis.
                </p>

            </div>

            <div class="px-6 pb-6 flex flex-col sm:flex-row gap-3">

                <button
                    type="button"
                    onclick="closeDeleteResepModal()"
                    class="w-full px-5 py-3 rounded-xl border border-slate-300 text-slate-600 hover:bg-slate-50 transition">

                    Batal

                </button>

                <button
                    type="button"
                    onclick="deleteResepConfirmed()"
                    class="w-full px-5 py-3 rounded-xl bg-red-600 text-white hover:bg-red-700 transition">

                    Ya, Hapus

                </button>

            </div>

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
    let editingResepRow = null;
    let deleteResepTarget = null;

    function openResepModal(row = null) {
        editingResepRow = row;

        const modal = document.getElementById('resepModal');
        const title = document.getElementById('resepModalTitle');

        const namaInput = document.getElementById('modalNamaObat');
        const jumlahInput = document.getElementById('modalJumlah');
        const aturanInput = document.getElementById('modalAturan');

        if (!modal || !title || !namaInput || !jumlahInput || !aturanInput) {
            return;
        }

        if (row) {
            title.innerText = 'Ubah Resep';

            namaInput.value = row.querySelector('input[name="nama_obat[]"]').value;
            jumlahInput.value = row.querySelector('input[name="jumlah[]"]').value;
            aturanInput.value = row.querySelector('input[name="aturan_pakai[]"]').value;
        } else {
            title.innerText = 'Tambah Resep';

            namaInput.value = '';
            jumlahInput.value = '';
            aturanInput.value = '';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    }

    function closeResepModal() {
        const modal = document.getElementById('resepModal');

        if (!modal) {
            return;
        }

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        editingResepRow = null;
    }

    function saveResep() {
        const nama = document.getElementById('modalNamaObat').value.trim();
        const jumlah = document.getElementById('modalJumlah').value.trim();
        const aturan = document.getElementById('modalAturan').value.trim();

        if (!nama) {
            alert('Nama obat wajib diisi.');
            return;
        }

        if (editingResepRow) {
            updateResepRow(editingResepRow, nama, jumlah, aturan);
        } else {
            createResepRow(nama, jumlah, aturan);
        }

        closeResepModal();
    }

    function createResepRow(nama, jumlah, aturan) {
        const container = document.getElementById('obatContainer');

        const firstEmptyRow = [...container.querySelectorAll('.obat-row')].find(row => {
            return row.querySelector('input[name="nama_obat[]"]').value.trim() === '';
        });

        if (firstEmptyRow) {
            updateResepRow(firstEmptyRow, nama, jumlah, aturan);
            return;
        }

        const row = document.createElement('div');

        row.className = 'obat-row border border-slate-200 rounded-2xl p-5 bg-slate-50/60';

        row.innerHTML = `
            <input type="hidden" name="nama_obat[]" value="">
            <input type="hidden" name="jumlah[]" value="">
            <input type="hidden" name="aturan_pakai[]" value="">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h4 class="obat-nama font-bold text-slate-800 text-lg"></h4>

                    <div class="flex flex-wrap gap-x-6 gap-y-2 mt-2 text-sm text-slate-600">
                        <span>
                            <b>Jumlah / Dosis</b>
                            <span class="obat-jumlah"></span>
                        </span>

                        <span>
                            <b>Aturan Pakai</b>
                            <span class="obat-aturan"></span>
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-sm">
                    <button
                        type="button"
                        onclick="openResepModal(this.closest('.obat-row'))"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-50 text-blue-600 border border-blue-200 hover:bg-blue-600 hover:text-white transition">
                        <i data-feather="edit-2" class="w-4 h-4"></i>
                        Ubah
                    </button>

                    <button
                        type="button"
                        onclick="confirmHapusResep(this)"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 border border-red-200 hover:bg-red-600 hover:text-white transition">
                        <i data-feather="trash-2" class="w-4 h-4"></i>
                        Hapus
                    </button>
                </div>
            </div>
        `;

        container.appendChild(row);

        updateResepRow(row, nama, jumlah, aturan);

        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    }

    function updateResepRow(row, nama, jumlah, aturan) {
        row.querySelector('input[name="nama_obat[]"]').value = nama;
        row.querySelector('input[name="jumlah[]"]').value = jumlah;
        row.querySelector('input[name="aturan_pakai[]"]').value = aturan;

        row.querySelector('.obat-nama').innerText = nama || 'Belum ada nama obat';
        row.querySelector('.obat-jumlah').innerText = jumlah || '-';
        row.querySelector('.obat-aturan').innerText = aturan || '-';
    }

    function confirmHapusResep(button) {
        deleteResepTarget = button;

        const modal = document.getElementById('deleteResepModal');

        if (!modal) {
            return;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        if (typeof feather !== 'undefined') {
            feather.replace();
        }
    }

    function closeDeleteResepModal() {
        const modal = document.getElementById('deleteResepModal');

        if (!modal) {
            return;
        }

        modal.classList.add('hidden');
        modal.classList.remove('flex');

        deleteResepTarget = null;
    }

    function deleteResepConfirmed() {
        if (!deleteResepTarget) {
            return;
        }

        const container = document.getElementById('obatContainer');
        const rows = container.querySelectorAll('.obat-row');
        const row = deleteResepTarget.closest('.obat-row');

        if (rows.length <= 1) {
            updateResepRow(row, '', '', '');
        } else {
            row.remove();
        }

        closeDeleteResepModal();
    }

    if (typeof feather !== 'undefined') {
        feather.replace();
    }
</script>

@endsection