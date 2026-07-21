@extends('layouts.dokter')

@section('content')

<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-8">
    <div>
        <h1 class="text-3xl font-bold text-slate-800">Konsultasi Pasien</h1>
        <p class="text-slate-500 mt-2">Pemeriksaan dan pencatatan rekam medis pasien secara lengkap</p>
    </div>
</div>

<form action="{{ route('rekam-medis.store', $jadwal->id) }}" method="POST" class="space-y-6">
    @csrf

    <!-- ============================================ -->
    <!-- 1. INFORMASI PASIEN (readonly)                -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Identitas Pasien</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-600">No. Rekam Medis</label>
                <input value="{{ $jadwal->pasien->no_rm }}" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Nama Lengkap</label>
                <input value="{{ $jadwal->pasien->name }}" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Umur</label>
                <input value="{{ \Carbon\Carbon::parse($jadwal->pasien->tanggal_lahir)->age }} Tahun" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Tanggal Konsultasi</label>
                <input value="{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
        </div>
        <!-- Tambahan jika ada alamat / kontak -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
            <div>
                <label class="block text-sm font-medium text-slate-600">Jenis Kelamin</label>
                <input value="{{ $jadwal->pasien->jenis_kelamin ?? '-' }}" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Nomor Telepon</label>
                <input value="{{ $jadwal->no_hp ?? '-' }}" readonly
                    class="w-full mt-1 bg-slate-100 rounded-xl p-3 border border-slate-200 text-slate-700">
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- 2. KELUHAN UTAMA (readonly)                   -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Keluhan Utama</h2>
        <textarea rows="3" readonly
            class="w-full rounded-xl p-4 bg-slate-50 border border-slate-200 text-slate-700">{{ $jadwal->keluhan }}</textarea>
    </div>

    <!-- ============================================ -->
    <!-- 3. PEMERIKSAAN FISIK                         -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Pemeriksaan Fisik</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            <div>
                <label class="block text-sm font-medium text-slate-600">Tekanan Darah (mmHg)</label>
                <input name="tekanan_darah" placeholder="Contoh: 120/80"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Suhu Tubuh (°C)</label>
                <input name="suhu_tubuh" placeholder="Contoh: 36.5"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Berat Badan (Kg)</label>
                <input name="berat_badan" placeholder="Contoh: 65"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Tinggi Badan (Cm)</label>
                <input name="tinggi_badan" placeholder="Contoh: 170"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
        </div>
        <!-- Tambahan: Nadi, Respirasi jika diperlukan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-4">
            <div>
                <label class="block text-sm font-medium text-slate-600">Nadi (x/menit)</label>
                <input name="nadi" placeholder="Contoh: 80"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Respirasi (x/menit)</label>
                <input name="respirasi" placeholder="Contoh: 20"
                    class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
        </div>
    </div>

    <!-- ============================================ -->
    <!-- 4. DIAGNOSIS                                 -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Diagnosis</h2>
        <textarea name="diagnosa" rows="4"
            class="w-full rounded-xl p-4 border border-slate-200 focus:ring-2 focus:ring-blue-400"
            placeholder="Tuliskan diagnosis utama dan diagnosis banding (jika ada)..." required></textarea>
    </div>

    <!-- ============================================ -->
    <!-- 5. TINDAKAN MEDIS                            -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Tindakan Medis</h2>
        <textarea name="tindakan" rows="3"
            class="w-full rounded-xl p-4 border border-slate-200 focus:ring-2 focus:ring-blue-400"
            placeholder="Tindakan yang diberikan, misal: injeksi, terapi, rujukan, dll."></textarea>
    </div>

    <!-- ============================================ -->
    <!-- 6. RESEP OBAT                                -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b pb-4 mb-5">

            <div>
                <h2 class="text-lg font-bold text-slate-700">
                    Resep Obat
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Tambahkan obat yang diberikan kepada pasien
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

            <!-- Baris pertama -->
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

        </div>

        <p class="text-xs text-slate-400 mt-4">
            * Gunakan tombol Tambah Resep untuk menambahkan obat. Data resep akan ikut tersimpan saat rekam medis disimpan.
        </p>

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

    <!-- ============================================ -->
    <!-- 7. CATATAN DOKTER                           -->
    <!-- ============================================ -->
    <div class="bg-white rounded-3xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-700 border-b pb-3 mb-5">Catatan Dokter</h2>
        <textarea name="catatan" rows="3"
            class="w-full rounded-xl p-4 border border-slate-200 focus:ring-2 focus:ring-blue-400"
            placeholder="Catatan tambahan, edukasi pasien, atau rencana kontrol berikutnya..."></textarea>
    </div>

    <!-- ============================================ -->
    <!-- 8. TOMBOL AKSI                               -->
    <!-- ============================================ -->
    <div class="flex justify-between items-center mt-8">
        <a href="{{ url()->previous() }}"
            class="flex items-center gap-2 px-6 py-3 bg-slate-200 hover:bg-slate-300 rounded-2xl font-medium text-slate-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
        <button type="submit"
            class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-medium flex items-center gap-2 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Simpan Rekam Medis
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