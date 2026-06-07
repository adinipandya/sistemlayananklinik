@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- HEADER -->
<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">
        Pusat Feedback Pasien
    </h1>

    <p class="text-slate-500 mt-1">
        Kelola masukan, kritik, dan saran dari pasien Klinik Polibatam.
    </p>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-3 gap-5 mb-8">

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm opacity-90">
            Total Feedback
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $feedback->count() }}
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm opacity-90">
            Menunggu Respon
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $feedback->where('status','Menunggu')->count() }}
        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        
        <p class="text-sm opacity-90">
            Sudah Direspon
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $feedback->where('status','Direspon')->count() }}
        </h2>

    </div>

</div>

<!-- FEEDBACK LIST -->
<div class="grid lg:grid-cols-2 gap-6">

    @foreach($feedback as $item)

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition">

        <!-- HEADER -->
        <div class="p-5 border-b">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-semibold text-slate-800">
                        {{ $item->user->name ?? '-' }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        {{ $item->kategori }}
                    </p>

                </div>

                <span class="text-yellow-500 font-semibold">

                    <i class="bi bi-star-fill"></i>

                    {{ $item->rating }}/5

                </span>

            </div>

        </div>

        <!-- KOMENTAR -->
        <div class="p-5">

            <p class="text-slate-700 leading-relaxed">
                "{{ $item->komentar }}"
            </p>

        </div>

        <!-- RESPON -->
        @if($item->status == 'Direspon')

        <div class="mx-5 mb-5 bg-green-50 border border-green-200 rounded-xl p-4">

            <p class="text-xs text-green-600 font-semibold mb-2">

                RESPON ADMIN

            </p>

            <p class="text-sm text-slate-700">

                {{ $item->respon }}

            </p>

        </div>

        @endif

        <!-- FOOTER -->
        <div class="px-5 pb-5 flex justify-between items-center">

            @if($item->status == 'Menunggu')

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

                Menunggu Respon

            </span>

            @else

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

                Sudah Direspon

            </span>

            @endif

            @if($item->status == 'Menunggu')

            <button
                onclick="openResponseModal({{ $item->id }})"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl flex items-center gap-2">

                <i class="bi bi-reply-fill"></i>

                Respon

            </button>

            @else

            <button
                onclick="openDetailResponse('{{ addslashes($item->respon) }}')"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl flex items-center gap-2">

                <i class="bi bi-eye-fill"></i>

                Lihat

            </button>

            @endif

        </div>

    </div>

    @endforeach

</div>

<!-- MODAL RESPON -->
<div id="responseModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">

            Respon Feedback Pasien

        </h2>

        <form id="responseForm" method="POST">

            @csrf
            @method('PUT')

            <textarea
                name="respon"
                rows="5"
                class="w-full border rounded-lg p-3"
                placeholder="Tulis respon untuk pasien..."
                required></textarea>

            <div class="flex gap-3 mt-4">

                <button
                    type="submit"
                    class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Kirim Respon

                </button>

                <button
                    type="button"
                    onclick="closeResponseModal()"
                    class="flex-1 bg-slate-500 text-white py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<!-- MODAL DETAIL RESPON -->
<div id="detailResponseModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">

            Respon yang Dikirim

        </h2>

        <div
            id="responseText"
            class="border rounded-lg p-4 bg-slate-50">
        </div>

        <button
            type="button"
            onclick="closeDetailResponse()"
            class="mt-4 w-full bg-blue-600 text-white py-3 rounded-lg">

            Tutup

        </button>

    </div>

</div>

<script>

function openResponseModal(id)
{
    document
        .getElementById('responseForm')
        .action =
        '/admin/feedback/' + id;

    document
        .getElementById('responseModal')
        .classList.remove('hidden');
}

function closeResponseModal()
{
    document
        .getElementById('responseModal')
        .classList.add('hidden');
}

function openDetailResponse(respon)
{
    document
        .getElementById('responseText')
        .innerText = respon;

    document
        .getElementById('detailResponseModal')
        .classList.remove('hidden');
}

function closeDetailResponse()
{
    document
        .getElementById('detailResponseModal')
        .classList.add('hidden');
}

</script>

@endsection