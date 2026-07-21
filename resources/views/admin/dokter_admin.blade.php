@extends('layouts.admin')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">
        Kelola Dokter
    </h1>
    <p class="text-slate-500 mt-1">
        Tambah, edit dan kelola data dokter Klinik.
    </p>
</div>

<!-- Statistik -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border rounded-xl p-5">
        <p class="text-sm text-slate-500">Total Dokter</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            {{ $dokters->count() }}
        </h2>
    </div>

    <div class="bg-white border rounded-xl p-5">
        <p class="text-sm text-slate-500">Dokter Umum</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">
            {{ $dokters->where('spesialis', 'UMUM')->count() }}
        </h2>
    </div>

    <div class="bg-white border rounded-xl p-5">
        <p class="text-sm text-slate-500">Dokter Gigi</p>
        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            {{ $dokters->where('spesialis', 'GIGI')->count() }}
        </h2>
    </div>

</div>

<!-- Search dan Tombol -->
<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">

    <input
        type="text"
        id="searchDokter"
        placeholder="Cari dokter..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">

    <button
        onclick="openTambahModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">
        + Tambah Dokter
    </button>

</div>

<!-- Card Dokter -->
<div id="dokterContainer" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

    @forelse($dokters as $item)

    <div class="dokter-card bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition">

        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-xl font-semibold text-slate-800">
                    {{ $item->nama }}
                </h3>
                <p class="text-sm text-slate-500">
                    {{ $item->spesialis }}
                </p>
            </div>
            @if($item->status == 'Aktif')
            <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Aktif</span>
            @else
            <span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full">Nonaktif</span>
            @endif
        </div>

        <div class="space-y-2 text-sm">
            <div>📞 {{ $item->no_hp }}</div>
            <div>✉️ {{ $item->email }}</div>
            <div>Hari Praktik: {{ $item->hari_praktek ?? '-' }}</div>
            <div>Jam Praktik: {{ $item->jam_praktek ?? '-' }}</div>

            <div class="text-slate-400">
                STR: {{ $item->no_str ?? '-' }} &bull; SIP: {{ $item->sip ?? '-' }}
            </div>
        </div>

        <div class="flex gap-2 mt-6">

            <button
                type="button"
                onclick="openEditModal(this)"
                data-id="{{ $item->id }}"
                data-nama="{{ $item->nama }}"
                data-nik="{{ $item->nik }}"
                data-email="{{ $item->email }}"
                data-no-str="{{ $item->no_str }}"
                data-no-sip="{{ $item->sip }}"
                data-spesialis="{{ $item->spesialis }}"
                data-no-hp="{{ $item->no_hp }}"
                data-hari-praktek="{{ $item->hari_praktek }}"
                data-jam-praktek="{{ $item->jam_praktek }}"
                data-status="{{ $item->status }}"
                class="flex-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 py-2 rounded-xl">
                Edit
            </button>

            <form
                action="/admin/dokter/{{ $item->id }}"
                method="POST"
                class="flex-1">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    onclick="return confirm('Yakin hapus dokter ini?')"
                    class="w-full bg-red-100 hover:bg-red-200 text-red-700 py-2 rounded-xl">
                    Hapus
                </button>
            </form>

        </div>

    </div>

    @empty

    <div class="col-span-full bg-white rounded-xl border p-10 text-center text-slate-500">
        Belum ada data dokter.
    </div>

    @endforelse

</div>

<!-- Modal Tambah -->
<div id="tambahModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg max-h-screen overflow-y-auto">

        <h2 class="text-xl font-bold mb-4">Tambah Dokter</h2>

        <form action="/admin/dokter" method="POST">
            @csrf

            <input
                type="text"
                name="nama"
                placeholder="Nama Dokter"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="text"
                name="nik"
                placeholder="NIK (16 digit)"
                maxlength="16"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="email"
                name="email"
                placeholder="Email"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="text"
                name="no_str"
                placeholder="Nomor STR"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="text"
                name="no_sip"
                placeholder="Nomor SIP"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <select
                name="spesialis"
                class="w-full border rounded-lg p-3 mb-3"
                required>
                <option value="">-- Pilih Spesialis --</option>
                <option value="Umum">Umum</option>
                <option value="Gigi">Gigi</option>
            </select>

            <input
                type="text"
                name="no_hp"
                placeholder="Nomor HP"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="text"
                name="hari_praktek"
                placeholder="Hari Praktik, contoh: Senin, Selasa, Rabu"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="text"
                name="jam_praktek"
                placeholder="Jam Praktik, contoh: 08:00-12:00"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                type="password"
                name="password"
                placeholder="Password (min. 8 karakter)"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <div class="flex gap-3">
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 text-white py-3 rounded-lg">
                    Simpan
                </button>
                <button
                    type="button"
                    onclick="closeTambahModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">
                    Batal
                </button>
            </div>

        </form>

    </div>

</div>

<!-- Modal Edit -->
<div id="editModal"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg max-h-screen overflow-y-auto">

        <h2 class="text-xl font-bold mb-4">Edit Dokter</h2>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <input
                id="editNama"
                type="text"
                name="nama"
                placeholder="Nama Dokter"
                class="w-full border rounded-lg p-3 mb-3"
                required>

            <input
                id="editNik"
                type="text"
                name="nik"
                placeholder="NIK (16 digit)"
                maxlength="16"
                class="w-full border rounded-lg p-3 mb-3 bg-slate-50 text-slate-500"
                readonly>

            <input
                id="editEmail"
                type="email"
                name="email"
                placeholder="Email"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editNoStr"
                type="text"
                name="no_str"
                placeholder="Nomor STR"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editNoSip"
                type="text"
                name="no_sip"
                placeholder="Nomor SIP"
                class="w-full border rounded-lg p-3 mb-3">

            <select
                id="editSpesialis"
                name="spesialis"
                class="w-full border rounded-lg p-3 mb-3">
                <option value="Umum">Umum</option>
                <option value="Gigi">Gigi</option>
            </select>

            <input
                id="editNoHp"
                type="text"
                name="no_hp"
                placeholder="Nomor HP"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editHariPraktek"
                type="text"
                name="hari_praktek"
                placeholder="Hari Praktik"
                class="w-full border rounded-lg p-3 mb-3">

            <input
                id="editJamPraktek"
                type="text"
                name="jam_praktek"
                placeholder="Jam Praktik"
                class="w-full border rounded-lg p-3 mb-3">

            <select
                id="editStatus"
                name="status"
                class="w-full border rounded-lg p-3 mb-3">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>

            <input
                type="password"
                name="password"
                placeholder="Password baru (kosongkan jika tidak diubah)"
                class="w-full border rounded-lg p-3 mb-3">

            <div class="flex gap-3">
                <button
                    type="submit"
                    class="flex-1 bg-blue-600 text-white py-3 rounded-lg">
                    Update
                </button>
                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">
                    Batal
                </button>
            </div>

        </form>

    </div>

</div>

<script>
    function openTambahModal() {
        document.getElementById('tambahModal').classList.remove('hidden');
    }

    function closeTambahModal() {
        document.getElementById('tambahModal').classList.add('hidden');
    }

    function openEditModal(button) {
        document.getElementById('editForm').action = '/admin/dokter/' + button.dataset.id;

        document.getElementById('editNama').value = button.dataset.nama ?? '';
        document.getElementById('editNik').value = button.dataset.nik ?? '';
        document.getElementById('editEmail').value = button.dataset.email ?? '';
        document.getElementById('editNoStr').value = button.dataset.noStr ?? '';
        document.getElementById('editNoSip').value = button.dataset.noSip ?? '';
        document.getElementById('editSpesialis').value = button.dataset.spesialis ?? '';
        document.getElementById('editNoHp').value = button.dataset.noHp ?? '';
        document.getElementById('editHariPraktek').value = button.dataset.hariPraktek ?? '';
        document.getElementById('editJamPraktek').value = button.dataset.jamPraktek ?? '';
        document.getElementById('editStatus').value = button.dataset.status ?? '';

        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    document.getElementById('searchDokter').addEventListener('keyup', function() {
        const value = this.value.toLowerCase();
        const cards = document.querySelectorAll('.dokter-card');
        cards.forEach(card => {
            const text = card.innerText.toLowerCase();
            card.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>

@endsection