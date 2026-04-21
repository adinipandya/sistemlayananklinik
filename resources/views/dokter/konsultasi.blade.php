@extends('layouts.dokter')

@section('content')

<h1 class="text-2xl font-bold mb-6">
    Konsultasi Pasien 🩺
</h1>

{{-- NOTIFIKASI SUKSES --}}
@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-2 gap-8">

    <!-- INFO PASIEN -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-4">Informasi Pasien</h2>

        <p><b>Nama:</b> Ihsan</p>
        <p><b>Umur:</b> 21 Tahun</p>
        <p><b>Keluhan:</b> Demam</p>
    </div>

    <!-- FORM REKAM MEDIS -->
    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-lg font-semibold mb-4">Isi Rekam Medis</h2>

        <form action="/dokter/konsultasi" method="POST">
            @csrf

            <div class="mb-4">
                <input type="text" name="nama" placeholder="Nama Pasien"
                    class="w-full border p-3 rounded-lg">
            </div>

            <div class="mb-4">
                <input type="date" name="tanggal"
                    class="w-full border p-3 rounded-lg">
            </div>

            <div class="mb-4">
                <input type="text" name="keluhan" placeholder="Keluhan"
                    class="w-full border p-3 rounded-lg">
            </div>

            <div class="mb-4">
                <input type="text" name="diagnosis" placeholder="Diagnosis"
                    class="w-full border p-3 rounded-lg">
            </div>

            <div class="mb-4">
                <textarea name="resep" placeholder="Resep Obat"
                    class="w-full border p-3 rounded-lg"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition">
                Simpan Rekam Medis
            </button>

        </form>

    </div>

</div>

<<<<<<< HEAD
@endsection
=======
@endsection 
>>>>>>> 5e7cb15 (views)
