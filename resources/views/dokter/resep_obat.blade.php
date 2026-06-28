@extends('layouts.dokter')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Resep Obat
        </h1>

        <p class="text-slate-500 mt-2">
            Daftar resep yang telah dibuat dokter
        </p>

    </div>

</div>

<!-- STATISTIK -->
<div class="grid lg:grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Total Resep
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalResep }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                <i data-feather="file-text" class="text-blue-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Resep Hari Ini
                </p>

                <h2 class="text-4xl font-bold mt-2 text-blue-600">
                    {{ $resepHariIni }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center">

                <i data-feather="calendar" class="text-cyan-600"></i>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-sm p-6">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-slate-500 text-sm">
                    Pasien Terlayani
                </p>

                <h2 class="text-4xl font-bold mt-2 text-green-600">
                    {{ $pasienTerlayani }}
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center">

                <i data-feather="users" class="text-green-600"></i>

            </div>

        </div>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <div class="p-6 border-b flex items-center justify-between">

        <h2 class="text-xl font-bold text-slate-800">
            Daftar Resep
        </h2>

        <form method="GET" class="relative w-80">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari pasien..."
                class="w-full border border-slate-200 rounded-xl
                   pl-4 pr-12 py-3">

            <button
                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500">

                <i data-feather="search" class="w-5 h-5"></i>

            </button>

        </form>

    </div>

    <div class="h-[650px] overflow-y-auto p-6">

        @if(request('search'))

        <div class="space-y-4">

            @forelse($rekamMedis as $item)

            <div class="border border-slate-200 rounded-3xl p-6
                        hover:border-blue-400 hover:shadow-md
                        transition-all duration-300">

                <div class="grid lg:grid-cols-12 gap-6 items-start">

                    <!-- INFO PASIEN -->
                    <div class="lg:col-span-8">

                        <div class="flex items-center gap-3 mb-4">

                            <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center">

                                <i data-feather="file-text"
                                    class="w-6 h-6 text-blue-600">
                                </i>

                            </div>

                            <div>

                                <h3 class="text-xl font-bold">
                                    {{ $item->jadwal->pasien->name }}
                                </h3>

                                <p class="text-slate-500 text-sm">
                                    {{ $item->jadwal->pasien->no_rm }}
                                    •
                                    {{ $item->created_at->format('d M Y') }}
                                </p>

                            </div>

                        </div>

                        <p class="font-semibold mb-3">
                            {{ $item->resepObat->count() }}
                            Obat Diresepkan
                        </p>

                        <div class="space-y-2">

                            @foreach($item->resepObat->take(3) as $resep)

                            <div class="bg-slate-50 rounded-xl p-3">

                                <div class="flex justify-between items-center">

                                    <p class="font-semibold text-slate-800">
                                        {{ $resep->nama_obat }}
                                    </p>

                                    <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                        {{ $resep->jumlah }}
                                    </span>

                                </div>

                                <p class="text-sm text-slate-500 mt-1">
                                    {{ $resep->aturan_pakai }}
                                </p>

                            </div>

                            @endforeach

                            @if($item->resepObat->count() > 3)

                            <p class="text-blue-600 text-sm">
                                +{{ $item->resepObat->count() - 3 }}
                                obat lainnya
                            </p>

                            @endif

                        </div>

                    </div>

                    <!-- TOMBOL -->
                    <div class="lg:col-span-4 flex justify-end">

                        <a
                            href="{{ route('resep.print', $item->id) }}"
                            target="_blank"
                            class="border border-blue-600 text-blue-600 px-4 py-2 rounded-xl hover:bg-blue-50 transition flex items-center gap-2">

                            <i data-feather="printer" class="w-4 h-4"></i>
                            Cetak Resep

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="text-center py-20 text-slate-500">

                Resep tidak ditemukan

            </div>

            @endforelse

        </div>

        @else

        <div class="h-full flex flex-col items-center justify-center text-slate-400">

            <svg
                class="w-16 h-16 mb-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.5"
                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 105.5 5.5a7.5 7.5 0 0011.15 11.15z" />

            </svg>

            <p class="text-lg font-medium">
                Cari pasien untuk melihat resep obat
            </p>

            <p class="text-sm mt-2">
                Masukkan nama pasien pada kolom pencarian di atas
            </p>

        </div>

        @endif

    </div>

</div>

@endsection