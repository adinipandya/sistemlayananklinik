@extends('layouts.dokter')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Profil Saya
    </h1>

    <p class="text-slate-500">
        Kelola informasi akun dokter
    </p>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

<div class="grid lg:grid-cols-3 gap-6">

    <!-- FOTO PROFIL -->
    <div class="bg-white rounded-2xl shadow-sm p-6">

        <div class="flex flex-col items-center">

            @if(Auth::user()->photo)

            <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                class="w-32 h-32 rounded-full object-cover border-4 border-blue-100">

            @else

            <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center">

                <i data-feather="user" class="w-12 h-12 text-blue-600"></i>

            </div>

            @endif

            <label for="photo"
                class="mt-4 bg-blue-600 text-white px-5 py-2 rounded-lg cursor-pointer hover:bg-blue-700">

                Ganti Foto

            </label>

            <p class="text-xs text-slate-500 mt-2">
                JPG, PNG maksimal 2MB
            </p>

        </div>

    </div>

    <!-- FORM -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">

        <h3 class="font-semibold text-lg mb-6">

            Informasi Akun

        </h3>

        <form action="/dokter/profile" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="file" name="photo" id="photo" class="hidden">

            <div class="grid md:grid-cols-2 gap-5">

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Nama Lengkap

                    </label>

                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ Auth::user()->email }}"
                        class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Nomor HP

                    </label>

                    <input type="text" placeholder="08123456789" class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Spesialisasi

                    </label>

                    <input type="text" value="Dokter Umum" class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Nomor SIP

                    </label>

                    <input type="text" value="SIP-2026-001" class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block text-sm text-slate-500 mb-2">

                        Jam Praktik

                    </label>

                    <input type="text" value="08.00 - 16.00" class="w-full border rounded-xl p-3">

                </div>

            </div>

            <button type="submit" class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@endsection