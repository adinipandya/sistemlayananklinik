@extends('layouts.pasien')

@section('content')

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Booking Jadwal  
</h1>

<div class="grid md:grid-cols-2 gap-6">

    <!-- FORM -->
    <div data-aos="fade-right"
    class="bg-white p-6 rounded-xl shadow-md">

        <h2 class="font-bold text-lg mb-4">Form Booking</h2>
        @if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

        <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
    @csrf

            <!-- PILIH DOKTER -->
            <div>
                <label class="font-semibold">Pilih Dokter</label>
                <select name="dokter" class="w-full mt-1 p-2 border rounded-lg">
                    <option>Dr. Ardi</option>
                    <option>Dr. Dini</option>
                    <option>Dr. Ihsan</option>
                </select>
            </div>
               <div>
                <label class="font-semibold">Pilih Spesaialis</label>
                <select name="spesialis" class="w-full mt-1 p-2 border rounded-lg">
                    <option>Dokter Umum</option>
                    <option>Dokter Gigi</option>
                </select>
            </div>

            <!-- TANGGAL -->
            <div>
                <label class="font-semibold">Tanggal</label>
                <input type="date" name="tanggal" class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <!-- JAM -->
            <div>
                <label class="font-semibold">Jam</label>
                <select name="jam" class="w-full mt-1 p-2 border rounded-lg">
                    <option>08:00</option>
                    <option>10:00</option>
                    <option>13:00</option>
                    <option>15:00</option>
                </select>
            </div>

            <!-- BUTTON -->
            <button type="submit"
            class="w-full bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg hover:scale-105 transition">
                Booking Sekarang
            </button>

        </form>
    </div>

    <!-- INFO -->
    <div data-aos="fade-left"
    class="bg-gradient-to-r from-blue-500 to-green-400 text-white p-6 rounded-xl">

        <h2 class="font-bold text-lg mb-4">Informasi</h2>

        <ul class="space-y-2">
            <li>Pilih dokter sesuai kebutuhan</li>
            <li>Datang 10 menit sebelum jadwal</li>
            <li>Bawa kartu identitas</li>
        </ul>

    </div>

</div>

<!-- POPUP SUCCESS -->
<div id="popup"
class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl text-center shadow-lg animate-popup w-[500px]">
        <h2 class="text-xl font-bold mb-2">Berhasil!</h2>
        <p class="mb-4">Booking kamu sudah dibuat</p>

        <button onclick="closePopup()"
        class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            OK
        </button>
    </div>

</div>

<script>
function showSuccess() {
    document.getElementById('popup').classList.remove('hidden');
}

function closePopup() {
    document.getElementById('popup').classList.add('hidden');
}
</script>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('popup').classList.remove('hidden');
});
</script>
@endif

@endsection