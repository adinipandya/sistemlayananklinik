@extends('layouts.dokter')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Ubah Password
</h1>

<div class="bg-white rounded-2xl shadow-sm p-6 max-w-2xl">

    <form>

        <div class="mb-4">

            <label class="block mb-2">
                Password Lama
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Password Baru
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Konfirmasi Password Baru
            </label>

            <input type="password"
            class="w-full border rounded-xl p-3">

        </div>

        <button
        class="bg-green-600 text-white px-6 py-3 rounded-xl">

            Update Password

        </button>

    </form>

</div>

@endsection