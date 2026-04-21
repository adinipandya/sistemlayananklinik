@extends('layouts.dokter')

@section('content')

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Rekam Medis 📄
</h1>

<!-- LIST CARD -->
<div class="grid md:grid-cols-2 gap-6">

    <!-- CARD 1 -->
    <div data-aos="fade-up"
    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-bold text-lg">Dr. Ardi</h3>
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                Selesai
            </span>
        </div>

        <p class="text-gray-500 mb-2">📅 2026-04-20</p>
        <p class="text-gray-600 mb-4">Diagnosa: Flu & Batuk</p>

        <button onclick="openModal()"
        class="text-blue-500 hover:underline">
            Lihat Detail
        </button>
    </div>

    <!-- CARD 2 -->
    <div data-aos="fade-up" data-aos-delay="150"
    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">

        <div class="flex justify-between items-center mb-3">
            <h3 class="font-bold text-lg">Dr. Ihsan</h3>
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                Menunggu
            </span>
        </div>

        <p class="text-gray-500 mb-2">📅 2026-04-25</p>
        <p class="text-gray-600 mb-4">Diagnosa: -</p>

        <button class="text-gray-400 cursor-not-allowed">
            Belum tersedia
        </button>
    </div>

</div>

<!-- MODAL DETAIL -->
<div id="modal"
class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md animate-popup">

        <h2 class="text-xl font-bold mb-4">Detail Rekam Medis</h2>

        <div class="space-y-2 text-gray-600">
            <p><b>Dokter:</b> Dr. Ihsan</p>
            <p><b>Tanggal:</b> 2026-04-20</p>
            <p><b>Diagnosa:</b> Flu & Batuk</p>
            <p><b>Resep:</b> Paracetamol, Vitamin C</p>
        </div>

        <button onclick="closeModal()"
        class="mt-6 w-full bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg">
            Tutup
        </button>

    </div>

</div>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>

@endsection
