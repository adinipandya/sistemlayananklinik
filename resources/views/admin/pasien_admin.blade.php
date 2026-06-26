@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Kelola Pasien</h1>
    <p class="text-slate-500 mt-1">Verifikasi akun pasien dan kelola data pasien Klinik Polibatam.</p>
</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Total Pasien</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">{{ $totalPasien }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Pasien Aktif</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">{{ $pasienAktif }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Menunggu Verifikasi</p>
        <h2 class="text-3xl font-bold text-yellow-500 mt-2">{{ $menungguVerifikasi }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <p class="text-sm text-slate-500">Profil Belum Lengkap</p>
        <h2 class="text-3xl font-bold text-red-500 mt-2">{{ $profilBelumLengkap }}</h2>
    </div>

</div>

<!-- SEARCH -->
<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">
    <input type="text" id="searchPasien" placeholder="Cari nama atau NIK pasien..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">
    <div class="text-sm text-slate-500 flex items-center">
        Pasien melakukan registrasi secara mandiri
    </div>
</div>

<!-- TABEL PASIEN -->
<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-slate-50">
            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Nama</th>
                <th class="p-4 text-left">NIK</th>
                <th class="p-4 text-left">No HP</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @forelse($pasien as $item)
            <tr class="border-t">

                <td class="p-4">{{ $loop->iteration }}</td>
                <td class="p-4">{{ $item->name }}</td>
                <td class="p-4">{{ $item->nik }}</td>
                <td class="p-4">{{ $item->no_hp }}</td>

                <td class="p-4">
                    @if($item->status == 'Aktif')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Aktif</span>
                    @else
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Menunggu</span>
                    @endif
                </td>

                <td class="p-4">
                    <div class="flex gap-2">

                        @if($item->status == 'Menunggu')
                        <form action="/admin/pasien/{{ $item->id }}/verifikasi" method="POST">
                            @csrf
                            @method('PUT')
                            <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg">
                                <i class="bi bi-check-lg"></i>
                            </button>
                        </form>
                        @endif

                        <button onclick="openDetailModal(
                            '{{ $item->name }}',
                            '{{ $item->nik }}',
                            '{{ $item->tanggal_lahir ?? '-' }}',
                            '{{ $item->jenis_kelamin ?? '-' }}',
                            '{{ $item->no_hp ?? '-' }}',
                            '{{ $item->alamat ?? '-' }}',
                            '{{ $item->golongan_darah ?? '-' }}'
                        )" class="bg-blue-100 hover:bg-blue-200 text-blue-600 px-3 py-2 rounded-lg">
                            <i class="bi bi-eye"></i>
                        </button>

                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-6 text-slate-500">Belum ada pasien.</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

<!-- MODAL DETAIL PASIEN -->
<div id="detailModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-xl">
        <div class="p-6 border-b">
            <h2 class="text-xl font-semibold">Identitas Pasien</h2>
        </div>
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-slate-500">Nama</p>
                    <p id="detailNama"></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">NIK</p>
                    <p id="detailNik"></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Tanggal Lahir</p>
                    <p id="detailTgl"></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Jenis Kelamin</p>
                    <p id="detailJk"></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">No HP</p>
                    <p id="detailHp"></p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">Golongan Darah</p>
                    <p id="detailGoldar"></p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-sm text-slate-500">Alamat</p>
                <p id="detailAlamat"></p>
            </div>
            <button onclick="closeDetailModal()"
                class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function openDetailModal(nama, nik, tgl, jk, hp, alamat, goldar) {
        document.getElementById('detailNama').innerText = nama;
        document.getElementById('detailNik').innerText = nik;
        document.getElementById('detailTgl').innerText = tgl;
        document.getElementById('detailJk').innerText = jk;
        document.getElementById('detailHp').innerText = hp;
        document.getElementById('detailAlamat').innerText = alamat;
        document.getElementById('detailGoldar').innerText = goldar;
        document.getElementById('detailModal').classList.remove('hidden');
    }

    document.getElementById('searchPasien').addEventListener('keyup', function () {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>

@endsection