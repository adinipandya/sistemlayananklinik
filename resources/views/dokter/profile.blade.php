@extends('layouts.dokter')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Profil Dokter
    </h1>

    <p class="text-slate-500 mt-2">
        Kelola informasi akun dan data praktik dokter
    </p>

</div>

@if(session('success'))

<div
    class="mb-6 bg-green-100 border border-green-200 text-green-700 px-5 py-4 rounded-2xl">

    {{ session('success') }}

</div>

@endif

<div class="grid lg:grid-cols-3 gap-6">

    <!-- PROFILE CARD -->
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <div class="flex flex-col items-center">

            @if(Auth::user()->photo)

            <img
                src="{{ asset('storage/' . Auth::user()->photo) }}"
                class="w-40 h-40 rounded-full object-cover border-4 border-emerald-100">

            @else

            <div
                class="w-40 h-40 rounded-full bg-blue-100 flex items-center justify-center">

                <i
                    data-feather="user"
                    class="w-16 h-16 text-emerald-600">
                </i>

            </div>

            @endif

            <h2 class="text-2xl font-bold mt-5">

                {{ Auth::user()->name }}

            </h2>

            <p class="text-slate-500">
                Dokter {{ $dokter->spesialis ?? '-' }}
            </p>

            <label
                for="photo"
                class="mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl cursor-pointer">

                Ganti Foto

            </label>

        </div>

        <div class="mt-8 border-t pt-6">

            <div class="space-y-4">

                <div class="flex justify-between">

                    <span class="text-slate-500">
                        Status
                    </span>

                    <span
                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                        {{ auth()->user()->status }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="lg:col-span-2">

        <form
            action="/dokter/profile"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white rounded-3xl shadow-sm p-8">

            @csrf

            <input
                type="file"
                name="photo"
                id="photo"
                class="hidden">

            <h2 class="text-xl font-bold mb-6">
                Informasi Akun
            </h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ Auth::user()->name }}"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        NIK

                    </label>

                    <input
                        type="text"
                        value="{{ $dokter->nik }}"
                        readonly
                        class="w-full border rounded-2xl p-3 bg-slate-100">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ Auth::user()->email }}"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nomor HP

                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ $dokter->no_hp }}"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Spesialis

                    </label>

                    <input
                        type="text"
                        name="spesialis"
                        value="{{ $dokter->spesialis }}"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nomor SIP

                    </label>

                    <input
                        type="text"
                        name="sip"
                        value="{{ $dokter->sip }}"
                        class="w-full border rounded-2xl p-3">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Nomor STR

                    </label>

                    <input
                        type="text"
                        value="{{ $dokter->no_str }}"
                        readonly
                        class="w-full border rounded-2xl p-3 bg-slate-100">

                </div>

                <div>

                    <label
                        class="block text-sm text-slate-500 mb-2">

                        Jadwal Praktik

                    </label>

                    <input
                        type="text"
                        value="{{ $dokter->jam_praktek ?? '08:00 - 16:00' }}"
                        readonly
                        class="w-full border rounded-2xl p-3 bg-slate-100">

                </div>

            </div>

            <div class="mt-8 flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl">

                    Simpan Perubahan

                </button>

                <a
                    href="/dokter/password"
                    class="border px-6 py-3 rounded-2xl hover:bg-slate-50">

                    Ubah Password

                </a>

            </div>

        </form>

    </div>

</div>

@endsection