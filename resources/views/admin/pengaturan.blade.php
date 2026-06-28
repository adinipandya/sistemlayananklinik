@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Pengaturan Akun</h1>
    <p class="text-slate-500 mt-1">Kelola informasi akun admin Klinik Polibatam.</p>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-6">{{ session('error') }}</div>
@endif

<div class="flex flex-col md:flex-row gap-6">

    <!-- KARTU KIRI: FOTO PROFIL -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col items-center w-full md:w-72 shrink-0">

        <div class="w-32 h-32 rounded-full overflow-hidden bg-slate-200 mb-4">
            @if(auth()->user()->foto)
                <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-4xl text-slate-400">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif
        </div>

        <h2 class="text-lg font-bold text-slate-800">{{ auth()->user()->name }}</h2>
        <p class="text-slate-500 text-sm mb-4">Admin Klinik Polibatam</p>

        <form action="/admin/pengaturan/foto" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            <label class="w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded-xl cursor-pointer block">
                <i class="bi bi-camera mr-1"></i> Ganti Foto
                <input type="file" name="foto" class="hidden" onchange="this.form.submit()">
            </label>
        </form>

        <div class="w-full mt-6 border-t pt-4 space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-slate-500">Email</span>
                <span class="font-medium text-slate-700 truncate ml-2">{{ auth()->user()->email }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Role</span>
                <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs font-medium">Admin</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Status</span>
                <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded-full text-xs font-medium">Aktif</span>
            </div>
        </div>

    </div>

    <!-- KARTU KANAN: FORM INFO AKUN -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 flex-1">

        <h3 class="text-lg font-semibold text-slate-800 mb-6">Informasi Akun</h3>

        <form action="/admin/pengaturan" method="POST">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="text-sm text-slate-500 mb-1 block">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}"
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-sm text-slate-500 mb-1 block">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}"
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-sm text-slate-500 mb-1 block">Nomor HP</label>
                    <input type="text" name="no_hp" value="{{ auth()->user()->no_hp }}"
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-medium">
                    Simpan Perubahan
                </button>
                <a href="/admin/password"
                    class="border border-slate-300 hover:bg-slate-50 text-slate-700 px-6 py-3 rounded-xl font-medium">
                    Ubah Password
                </a>
            </div>

        </form>
    </div>

</div>
@endsection