@extends('layouts.pasien')

@section('content')

<div class="flex items-center gap-4 mb-8"
     data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="calendar"
           class="w-7 h-7 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Jadwal Konsultasi
        </h1>

        <p class="text-slate-500">
            Kelola jadwal konsultasi Anda
        </p>

    </div>

</div>
<!-- STATISTIK -->

<div class="grid md:grid-cols-3 gap-5 mb-8">


<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Jadwal Aktif
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        {{ $jadwalAktif }}
    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Konsultasi Selesai
    </p>

    <h2 class="text-3xl font-bold text-green-600 mt-2">
        {{ $konsultasiSelesai }}
    </h2>

</div>

<div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

    <p class="text-sm text-slate-500">
        Total Booking
    </p>

    <h2 class="text-3xl font-bold text-blue-600 mt-2">
        {{ $totalBooking }}
    </h2>

</div>


</div>

<!-- JADWAL BERIKUTNYA -->

<div
data-aos="fade-up"
class="bg-green-600 text-white rounded-xl p-6 mb-8
hover:bg-green-700
hover:shadow-lg
transition-all duration-300">


@if($jadwalTerdekat)

<div class="grid md:grid-cols-4 gap-4">

    <div>
        <p class="text-sm text-green-100">
            Dokter
        </p>
        <p class="font-medium">
            Dr. {{ $jadwalTerdekat?->dokter?->nama }}
        </p>
    </div>

    <div>
        <p class="text-sm text-green-100">
            Tanggal
        </p>
       <p class="font-medium text-white">
    {{ \Carbon\Carbon::parse($jadwalTerdekat?->tanggal)->format('d M Y') }}
</p>
    </div>

    <div>
        <p class="text-sm text-green-500">
            Jam
        </p>
        <p class="font-medium">
    {{ substr($jadwalTerdekat?->jam,0,5) }} WIB
</p>
    </div>

    <div>
    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
        {{ $jadwalTerdekat?->status ?? '-' }}
    </span>
</div>

</div>
@else

<div class="text-center py-8">

    <p class="text-xl font-semibold">
        Tidak ada jadwal terdekat
    </p>

    <p class="text-green-100 mt-2">
        Silakan melakukan booking konsultasi terlebih dahulu.
    </p>

</div>

@endif

</div>

<!-- TABEL -->

<div
data-aos="fade-up"
data-aos-delay="200"
class="bg-white border border-slate-200 rounded-xl overflow-hidden">


<div class="p-5 border-b">

    <h2 class="font-semibold text-slate-700">
        Daftar Jadwal Konsultasi
    </h2>

</div>

<table class="w-full">

    <thead class="bg-slate-50">

        <tr>

        <th class="p-4 text-center">No Antrian</th>

            <th class="text-left p-4">
                Dokter
            </th>

            <th class="text-left p-4">
                Tanggal
            </th>

            <th class="text-left p-4">
                Jam
            </th>

            <th class="text-left p-4">
                Status
            </th>
            <th class="text-center p-4">
    Aksi
</th>

        </tr>

    </thead>

    <tbody>
        @forelse($jadwal as $item)
        <tr class="border-t">

    <td class="p-4 text-center font-semibold text-blue-600">
        {{ $item->nomor_antrian }}
    </td>

    <td class="p-4">
        Dr. {{ $item->dokter->nama }}
    </td>

    <td class="p-4">
        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
    </td>

    <td class="p-4">
        {{ substr($item->jam,0,5) }} WIB
    </td>

    <td class="p-4">

@if(
    $item->status == 'Menunggu' &&
    $item->tanggal < now()->toDateString()
)

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
    Tidak Hadir
</span>

@elseif($item->status == 'Selesai')

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
    Selesai
</span>

@else

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
    {{ $item->status }}
</span>

@endif

</td>
<td class="p-4 text-center">

@if($item->status == 'Menunggu')

<button
    onclick="openCancelModal({{ $item->id }})"
    class="bg-red-500 hover:bg-red-600 text-white font-medium
           px-4 py-2 rounded-lg
           transition-all duration-300
           hover:scale-105 hover:shadow-xl">
    Batalkan
</button>
@else

<span class="text-slate-400">
    -
</span>

@endif

</td>
</tr>
@empty

<tr>
    <td colspan="5" class="text-center py-8 text-slate-500">
        Tidak ada jadwal konsultasi.    
    </td>
</tr>

@endforelse

</tbody>

</table>


</div>

<!-- MODAL BATAL -->

<div id="cancelModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div id="cancelModalContent"
    class="bg-white rounded-2xl p-6 w-full max-w-md text-center">

    <h2 class="text-xl font-bold mb-2">
        Batalkan Jadwal?
    </h2>

    <p class="text-slate-500 mb-6">
        Jadwal konsultasi yang dibatalkan tidak dapat dikembalikan.
    </p>

    <div class="flex gap-3">

    <button
        onclick="closeCancelModal()"
        class="flex-1 border border-slate-300 py-3 rounded-lg">
        Kembali
    </button>

    <form id="cancelForm" method="POST" class="flex-1">
        @csrf

        <button
            type="submit"
            class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-lg">
            Ya, Batalkan
        </button>
    </form>

</div>

</div>


</div>

<script>

function openCancelModal(id) {

    document.getElementById('cancelModal').classList.remove('hidden');

    document.getElementById('cancelForm').action =
        "/pasien/jadwal/" + id + "/batal";
}

function closeCancelModal() {
    document.getElementById('cancelModal').classList.add('hidden');
}
</script>

@endsection
