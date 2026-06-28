@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">Ubah Password</h1>
    <p class="text-slate-500 mt-1">Perbarui password akun admin Anda.</p>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-6">{{ session('error') }}</div>
@endif

<div class="bg-white border border-slate-200 rounded-2xl p-6 max-w-lg">

    <form action="/admin/password" method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">

            <div>
                <label class="text-sm text-slate-500 mb-1 block">Password Lama</label>
                <input type="password" name="password_lama" placeholder="Masukkan password lama"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="text-sm text-slate-500 mb-1 block">Password Baru</label>
                <input type="password" name="password_baru" placeholder="Masukkan password baru"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="text-sm text-slate-500 mb-1 block">Konfirmasi Password Baru</label>
                <input type="password" name="password_konfirmasi" placeholder="Ulangi password baru"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-medium">
                Simpan Password
            </button>
            <a href="/admin/pengaturan"
                class="border border-slate-300 hover:bg-slate-50 text-slate-700 px-6 py-3 rounded-xl font-medium">
                Batal
            </a>
        </div>

    </form>
</div>

@endsection