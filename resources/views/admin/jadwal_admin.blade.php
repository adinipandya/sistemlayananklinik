@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Kelola Jadwal
    </h1>

    <p class="text-slate-500 mt-1">
        Atur jadwal konsultasi dokter dan pasien Klinik Polibatam.
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-calendar-week text-blue-500"></i>

            <span class="text-sm text-slate-500">
                Total Jadwal
            </span>

        </div>

        <h2 class="text-4xl font-bold text-slate-800 mt-3">
            15
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-calendar-day text-green-500"></i>

            <span class="text-sm text-slate-500">
                Hari Ini
            </span>

        </div>

        <h2 class="text-4xl font-bold text-green-600 mt-3">
            5
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-hourglass-split text-yellow-500"></i>

            <span class="text-sm text-slate-500">
                Menunggu
            </span>

        </div>

        <h2 class="text-4xl font-bold text-yellow-500 mt-3">
            3
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <div class="flex items-center gap-2">

            <i class="bi bi-check-circle text-green-600"></i>

            <span class="text-sm text-slate-500">
                Selesai
            </span>

        </div>

        <h2 class="text-4xl font-bold text-green-600 mt-3">
            12
        </h2>

    </div>

</div>

<!-- SEARCH + BUTTON -->
<div class="flex flex-col md:flex-row justify-between gap-4 mb-6">

    <input type="text" id="searchJadwal" placeholder="Cari dokter atau pasien..."
        class="border border-slate-300 rounded-xl px-4 py-3 w-full md:w-80">

    <button onclick="openTambahModal()"
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl flex items-center gap-2">

        <i class="bi bi-plus-lg"></i>

        Tambah Jadwal

    </button>

</div>

<!-- TIMELINE JADWAL -->

<div id="jadwalContainer" class="space-y-6">

    <div class="relative pl-10 jadwal-card">

        <div class="absolute left-0 top-3 w-4 h-4 rounded-full bg-blue-600"></div>

        <div class="absolute left-[7px] top-7 h-full w-[2px] bg-slate-200"></div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">

            <div class="flex justify-between items-center">

                <h3 class="font-semibold text-lg text-slate-800">
                    dr. Ardi
                </h3>

                <span class="text-sm font-medium text-blue-600">
                    08:00
                </span>

            </div>

            <div class="mt-4 space-y-2 text-sm">

                <p>
                    <span class="text-slate-500">
                        Pasien :
                    </span>

                    Ihsan
                </p>

                <p>
                    <span class="text-slate-500">
                        Tanggal :
                    </span>

                    10 Juni 2026
                </p>

            </div>

            <div class="mt-4 flex justify-between items-center">

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                    Menunggu

                </span>

                <div class="flex gap-2">

                    <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 p-2 rounded-lg">

                        <i class="bi bi-pencil-square"></i>

                    </button>

                    <button class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg">

                        <i class="bi bi-trash"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

    <div class="relative pl-10 jadwal-card">

        <div class="absolute left-0 top-3 w-4 h-4 rounded-full bg-green-600"></div>

        <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm hover:shadow-md transition">

            <div class="flex justify-between items-center">

                <h3 class="font-semibold text-lg text-slate-800">
                    dr. Dini
                </h3>

                <span class="text-sm font-medium text-green-600">
                    09:00
                </span>

            </div>

            <div class="mt-4 space-y-2 text-sm">

                <p>
                    <span class="text-slate-500">
                        Pasien :
                    </span>

                    Ardi
                </p>

                <p>
                    <span class="text-slate-500">
                        Tanggal :
                    </span>

                    10 Juni 2026
                </p>

            </div>

            <div class="mt-4 flex justify-between items-center">

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                    Selesai

                </span>

                <div class="flex gap-2">

                    <button class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 p-2 rounded-lg">

                        <i class="bi bi-pencil-square"></i>

                    </button>

                    <button class="bg-red-100 hover:bg-red-200 text-red-700 p-2 rounded-lg">

                        <i class="bi bi-trash"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- MODAL TAMBAH -->
<div id="tambahModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">

            <i class="bi bi-calendar-plus mr-2"></i>

            Tambah Jadwal

        </h2>

        <form>

            <input type="date" class="w-full border rounded-lg p-3 mb-3">

            <input type="time" class="w-full border rounded-lg p-3 mb-3">

            <select class="w-full border rounded-lg p-3 mb-3">

                <option>Pilih Dokter</option>

            </select>

            <select class="w-full border rounded-lg p-3 mb-4">

                <option>Pilih Pasien</option>

            </select>

            <div class="flex gap-3">

                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Simpan

                </button>

                <button type="button" onclick="closeTambahModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openTambahModal() {

        document
            .getElementById('tambahModal')
            .classList.remove('hidden');

    }

    function closeTambahModal() {

        document
            .getElementById('tambahModal')
            .classList.add('hidden');

    }

    document
        .getElementById('searchJadwal')
        .addEventListener('keyup', function () {

            let value = this.value.toLowerCase();

            let cards = document.querySelectorAll('.jadwal-card');

            cards.forEach(card => {

                let text = card.innerText.toLowerCase();

                card.style.display =
                    text.includes(value) ?
                    '' :
                    'none';

            });

            rows.forEach(row => {

                let text = row.innerText.toLowerCase();

                row.style.display =
                    text.includes(value) ?
                    '' :
                    'none';

            });

        });
</script>

@endsection