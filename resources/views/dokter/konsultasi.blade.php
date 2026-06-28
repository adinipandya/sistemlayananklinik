@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">
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
        <div class="flex justify-between items-center border-b pb-3 mb-5">
            <h2 class="text-lg font-bold text-slate-700">Resep Obat</h2>
            <button type="button" onclick="tambahObat()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl text-sm font-medium flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Obat
            </button>
        </div>

        <div id="obatContainer">
            <!-- Baris pertama disediakan -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end mb-4 obat-row">
                <div>
                    <label class="block text-sm font-medium text-slate-600">Nama Obat</label>
                    <input type="text" name="nama_obat[]" placeholder="Contoh: Paracetamol" 
                           class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-600">Jumlah / Dosis</label>
                    <input type="text" name="jumlah[]" placeholder="Contoh: 3 x 1 tablet" 
                           class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-600">Aturan Pakai</label>
                    <input type="text" name="aturan_pakai[]" placeholder="Contoh: Setelah makan" 
                           class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
                </div>
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
        </div>

        <p class="text-xs text-slate-400 mt-3">* Isi minimal satu obat. Klik "Tambah Obat" untuk menambahkan baris baru.</p>
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
    function tambahObat() {
        const container = document.getElementById('obatContainer');
        const row = document.createElement('div');
        row.className = 'grid grid-cols-1 md:grid-cols-4 gap-4 items-end mb-4 obat-row';
        row.innerHTML = `
            <div>
                <label class="block text-sm font-medium text-slate-600">Nama Obat</label>
                <input type="text" name="nama_obat[]" placeholder="Contoh: Amoxicillin" 
                       class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Jumlah / Dosis</label>
                <input type="text" name="jumlah[]" placeholder="Contoh: 2 x 500 mg" 
                       class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-600">Aturan Pakai</label>
                <input type="text" name="aturan_pakai[]" placeholder="Contoh: Sebelum makan" 
                       class="w-full mt-1 rounded-xl p-3 border border-slate-200 focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="hapusObat(this)" 
                        class="text-red-500 hover:text-red-700 border border-red-300 hover:border-red-500 rounded-xl px-4 py-2 text-sm flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus
                </button>
            </div>
        `;
        container.appendChild(row);
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