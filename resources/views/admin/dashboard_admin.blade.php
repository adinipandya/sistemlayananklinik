@extends('layouts.admin')

@section('content')

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Admin
    </h1>

    <p class="text-slate-500 mt-1">
        Selamat datang, {{ Auth::user()->name }}
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Dokter
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            5
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Pasien
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            20
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Jadwal Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            8
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Feedback Masuk
        </p>

        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            {{ $totalFeedback }}
        </h2>

    </div>

</div>

<!-- JADWAL + FEEDBACK -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">

    <!-- JADWAL -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Jadwal Hari Ini
            </h2>

        </div>

        <div class="p-5 space-y-4">

            <div class="flex justify-between">

                <span>Dr. Ardi</span>
                <span class="text-slate-500">08.00</span>

            </div>

            <div class="flex justify-between">

                <span>Dr. Dini</span>
                <span class="text-slate-500">10.00</span>

            </div>

            <div class="flex justify-between">

                <span>Dr. Ihsan</span>
                <span class="text-slate-500">13.00</span>

            </div>

        </div>

    </div>

    <!-- FEEDBACK -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b flex justify-between items-center">

            <h2 class="font-semibold">
                Feedback Terbaru
            </h2>

            <a href="/admin/feedback" class="text-blue-600 text-sm hover:underline">

                Lihat Semua

            </a>

        </div>

        <div class="p-5 space-y-4">

            @forelse($feedbackTerbaru as $item)

            <div class="border-b pb-3">

                <div class="flex justify-between">

                    <p class="font-medium">
                        {{ $item->user->name ?? 'Pasien' }}
                    </p>

                    <span class="text-yellow-500">
                        {{ str_repeat('⭐', $item->rating) }}
                    </span>

                </div>

                <p class="text-sm text-slate-500 mt-1">

                    {{ \Illuminate\Support\Str::limit($item->komentar, 50) }}

                </p>

            </div>

            @empty

            <p class="text-slate-500">

                Belum ada feedback.

            </p>

            @endforelse

        </div>
    
    </div>

</div> 

<!-- MENUNGGU RESPON -->
<div class="bg-white border border-slate-200 rounded-xl p-5 mb-8">

    <p class="text-sm text-slate-500">
        Feedback Menunggu Respon
    </p>

    <h2 class="text-3xl font-bold text-red-500 mt-2">
        {{ $feedbackMenunggu }}
    </h2>

</div>

<!-- DOKTER + PASIEN -->
<div class="grid lg:grid-cols-2 gap-6 mb-8">
    <div class="grid lg:grid-cols-2 gap-6 mb-8">

        <!-- DOKTER -->
        <div class="bg-white border border-slate-200 rounded-xl">

            <div class="p-5 border-b">

                <h2 class="font-semibold">
                    Dokter Terbaru
                </h2>

            </div>

            <div class="p-5 space-y-3">

                <div class="flex justify-between">
                    <span>Dr. Ardi</span>
                    <span class="text-green-600 text-sm">
                        Aktif
                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Dr. Dini</span>
                    <span class="text-green-600 text-sm">
                        Aktif
                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Dr. Ihsan</span>
                    <span class="text-green-600 text-sm">
                        Aktif
                    </span>
                </div>

            </div>

        </div>

        <!-- PASIEN -->
        <div class="bg-white border border-slate-200 rounded-xl">

            <div class="p-5 border-b">

                <h2 class="font-semibold">
                    Pasien Terbaru
                </h2>

            </div>

            <div class="p-5 space-y-3">

                <div class="flex justify-between">
                    <span>Ardi</span>
                    <span class="text-slate-500 text-sm">
                        Baru
                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Dini</span>
                    <span class="text-slate-500 text-sm">
                        Baru
                    </span>
                </div>

                <div class="flex justify-between">
                    <span>Ihsan</span>
                    <span class="text-slate-500 text-sm">
                        Baru
                    </span>
                </div>

            </div>

        </div>

    </div>

    <!-- AKTIVITAS -->
    <div class="bg-white border border-slate-200 rounded-xl">

        <div class="p-5 border-b">

            <h2 class="font-semibold">
                Aktivitas Sistem
            </h2>

        </div>

        <div class="p-5 space-y-4">

            <div class="border-l-4 border-blue-500 pl-4">
                Pasien baru berhasil registrasi.
            </div>

            <div class="border-l-4 border-green-500 pl-4">
                Jadwal dokter diperbarui.
            </div>

            <div class="border-l-4 border-yellow-500 pl-4">
                Feedback baru telah diterima.
            </div>

        </div>

    </div>

    @endsection