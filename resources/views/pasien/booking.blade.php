@extends('layouts.pasien')

@section('content')

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Booking Jadwal  
</h1>

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

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

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Booking Konsultasi
        </h1>

        <p class="text-slate-500">
            Pilih dokter terlebih dahulu
        </p>

    </div>

</div>

<!-- DOKTER -->
<div class="grid md:grid-cols-3 gap-6">

@foreach($dokters as $dokter)

<div
data-aos="fade-up"
class="bg-white border border-slate-200 rounded-2xl p-5 text-center
hover:-translate-y-2
hover:shadow-xl
transition-all duration-300">

    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center">

        <i data-feather="user" class="text-blue-600 w-12 h-12"></i>

    </div>

    <h2 class="font-bold text-lg mt-4">
        Dr. {{ $dokter->nama }}
    </h2>

    <div class="mt-2 flex justify-center gap-2">

    @if($dokter->tersedia)

    <span class="px-3 py-1 bg-green-100 text-green-600 rounded-full text-xs">
        Tersedia
    </span>

    @else

    <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs">
        Tidak Praktik
    </span>

    @endif

    <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs">
        {{ $dokter->spesialis }}
    </span>

</div>

    <p class="text-sm text-slate-400 mt-2">
        {{ $dokter->hari_praktek }}
    </p>

    <p class="text-sm text-slate-400">
        {{ $dokter->jam_praktek }}
    </p>

    @if($dokter->tersedia)

<a
    href="{{ route('booking.dokter',$dokter->id) }}"
    class="mt-5 inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

    Pilih Dokter

</a>

@else

<button
    disabled
    class="mt-5 bg-slate-300 text-slate-500 px-5 py-2 rounded-lg cursor-not-allowed">

    Tidak Tersedia

</button>

@endif

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

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('popup').classList.remove('hidden');
});
</script>
@endif

@endsection