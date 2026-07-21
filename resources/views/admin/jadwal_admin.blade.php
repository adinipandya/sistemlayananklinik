@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Kelola Jadwal</h1>
    <p class="text-slate-500 mt-1">Atur jadwal konsultasi dokter dan pasien Klinik Polibatam.</p>
</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex items-center gap-2">
            <i data-feather="calendar" class="text-blue-500 w-4 h-4"></i>
            <span class="text-sm text-slate-500">Total Jadwal</span>
        </div>
        <h2 class="text-4xl font-bold text-slate-800 mt-3">{{ $totalJadwal }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex items-center gap-2">
            <i data-feather="calendar" class="text-green-500 w-4 h-4"></i>
            <span class="text-sm text-slate-500">Hari Ini</span>
        </div>
        <h2 class="text-4xl font-bold text-green-600 mt-3">{{ $hariIni }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex items-center gap-2">
            <i data-feather="clock" class="text-yellow-500 w-4 h-4"></i>
            <span class="text-sm text-slate-500">Menunggu</span>
        </div>
        <h2 class="text-4xl font-bold text-yellow-500 mt-3">{{ $menunggu }}</h2>
    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        <div class="flex items-center gap-2">
            <i data-feather="check-circle" class="text-green-600 w-4 h-4"></i>
            <span class="text-sm text-slate-500">Selesai</span>
        </div>
        <h2 class="text-4xl font-bold text-green-600 mt-3">{{ $selesai }}</h2>
    </div>

</div>

<!-- SEARCH + FILTER -->
<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">

    <input
        type="text"
        id="searchJadwal"
        placeholder="Cari dokter atau pasien..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80"
    >

    <div class="flex gap-2 flex-wrap">
        <button onclick="filterStatus('semua')" id="filter-semua"
            class="filter-btn px-4 py-2 rounded-xl text-sm font-medium bg-blue-600 text-white">
            Semua
        </button>
        <button onclick="filterStatus('Menunggu')" id="filter-Menunggu"
            class="filter-btn px-4 py-2 rounded-xl text-sm font-medium bg-white border border-slate-300 text-slate-600">
            Menunggu
        </button>
        <button onclick="filterStatus('Disetujui')" id="filter-Disetujui"
            class="filter-btn px-4 py-2 rounded-xl text-sm font-medium bg-white border border-slate-300 text-slate-600">
            Disetujui
        </button>
        <button onclick="filterStatus('Selesai')" id="filter-Selesai"
            class="filter-btn px-4 py-2 rounded-xl text-sm font-medium bg-white border border-slate-300 text-slate-600">
            Selesai
        </button>
        <button onclick="filterStatus('Dibatalkan')" id="filter-Dibatalkan"
            class="filter-btn px-4 py-2 rounded-xl text-sm font-medium bg-white border border-slate-300 text-slate-600">
            Dibatalkan
        </button>
    </div>

</div>

<!-- LIST JADWAL -->
<div id="jadwalContainer" class="space-y-4">

    @forelse($jadwals as $jadwal)

    <div class="jadwal-card bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition"
        data-status="{{ $jadwal->status }}">

        <div class="flex justify-between items-start">

            <div>
                <h3 class="font-semibold text-lg text-slate-800">
                    dr. {{ $jadwal->dokter->nama ?? '-' }}
                </h3>
                <p class="text-sm text-slate-500">{{ $jadwal->dokter->spesialis ?? '-' }}</p>
            </div>

            <span class="text-sm font-medium text-blue-600">
                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
            </span>

        </div>

        <div class="mt-4 grid grid-cols-2 gap-2 text-sm">
            <p><span class="text-slate-500">Pasien :</span> {{ $jadwal->pasien->name ?? '-' }}</p>
            <p><span class="text-slate-500">Tanggal :</span> {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</p>
            <p class="col-span-2"><span class="text-slate-500">Keluhan :</span> {{ $jadwal->keluhan }}</p>
        </div>

        <div class="mt-4 flex justify-between items-center">

            @if($jadwal->status == 'Menunggu')
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Menunggu</span>
            @elseif($jadwal->status == 'Disetujui')
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">Disetujui</span>
            @elseif($jadwal->status == 'Selesai')
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Selesai</span>
            @else
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Dibatalkan</span>
            @endif

            <div class="flex gap-2">

                @if($jadwal->status == 'Menunggu')
                    
                    <form action="/admin/jadwal/{{ $jadwal->id }}/status" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Dibatalkan">
                        <button type="submit"
                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg text-sm">
                            Batalkan
                        </button>
                    </form>
                @endif

                <form action="/admin/jadwal/{{ $jadwal->id }}" method="POST"
                    onsubmit="return confirm('Hapus jadwal ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg">
                        <i data-feather="trash-2" class="w-4 h-4"></i>
                    </button>
                </form>

            </div>

        </div>

    </div>

    @empty

    <div class="bg-white border border-slate-200 rounded-xl p-8 text-center text-slate-500">
        Belum ada data jadwal konsultasi.
    </div>

    @endforelse

</div>

<script>
    function filterStatus(status) {
        const cards = document.querySelectorAll('.jadwal-card');

        cards.forEach(card => {
            if (status === 'semua' || card.dataset.status === status) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });

        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-blue-600', 'text-white');
            btn.classList.add('bg-white', 'border', 'border-slate-300', 'text-slate-600');
        });

        const active = document.getElementById('filter-' + status);
        if (active) {
            active.classList.add('bg-blue-600', 'text-white');
            active.classList.remove('bg-white', 'border', 'border-slate-300', 'text-slate-600');
        }
    }

    document.getElementById('searchJadwal').addEventListener('keyup', function () {
        let value = this.value.toLowerCase();
        document.querySelectorAll('.jadwal-card').forEach(card => {
            card.style.display = card.innerText.toLowerCase().includes(value) ? '' : 'none';
        });
    });
</script>

@endsection