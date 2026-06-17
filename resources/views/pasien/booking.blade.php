@extends('layouts.pasien')

@section('content')

<!-- STATISTIK -->

   <h1 class="text-3xl font-bold text-slate-800">
        Booking Pasien
    </h1>

    <p class="text-slate-500 mt-1">
Kelola Booking Anda    </p>
<div class="grid md:grid-cols-3 gap-5 mb-8">


    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Booking Aktif
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            1
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Total Konsultasi
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            8
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm text-slate-500">
            Dokter Tersedia
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            3
        </h2>

    </div>


</div>

<!-- FORM + INFO -->

<div class="grid lg:grid-cols-2 gap-6">


    <!-- FORM BOOKING -->
    <div class="bg-white border border-slate-200 rounded-xl p-6">

        <h2 class="font-semibold text-lg mb-5">
            Form Booking
        </h2>
        @if(session('error'))

<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

    {{ session('error') }}

</div>

@endif

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

    {{ session('success') }}

</div>

@endif

        <form action="{{ route('booking.store') }}" method="POST">

            @csrf

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Pilih Dokter
                </label>

                <select name="dokter_id" class="w-full border border-slate-300 rounded-lg p-3">

                    @foreach($dokters as $dokter)

                    <option value="{{ $dokter->id }}">
                        Dr. {{ $dokter->nama }}
                    </option>

                    @endforeach

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

<div class="mt-8 bg-white border border-slate-200 rounded-xl overflow-hidden">


    <div class="p-5 border-b">

        <h2 class="font-semibold text-slate-700">
            Riwayat Booking
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left p-4">
                    Tanggal
                </th>

                <th class="text-left p-4">
                    Dokter
                </th>

                <th class="text-left p-4">
                    Status
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($riwayat as $item)

            <tr class="border-t">

                <td class="p-4">
                    {{ $item->tanggal }}
                </td>

                <td class="p-4">
                    Dr. {{ $item->dokter->nama }}
                </td>

                <td class="p-4">

                    <span class="px-3 py-1 rounded-full text-sm">

                        {{ $item->status }}

                    </span>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3" class="p-4 text-center">

                    Belum ada booking

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>


</div>

<!-- POPUP -->

<div id="popup" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


    <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-full max-w-sm">

        <h2 class="text-xl font-bold mb-2">
            Booking Berhasil
        </h2>

        <p class="text-slate-500 mb-2">
            Nomor Antrian
        </p>

        <p class="text-3xl font-bold text-blue-600 mb-4">
            A-001
        </p>

        <p class="text-sm text-slate-500 mb-6">
            Silakan datang 10 menit sebelum jadwal konsultasi.
        </p>

        <button onclick="closePopup()" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

            Tutup

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