<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Resep Obat</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {

            .no-print {
                display: none;
            }

            body {
                background: white !important;
            }

            .print-area {
                box-shadow: none !important;
            }

        }
    </style>

</head>

<body class="bg-slate-100 py-10">

    <div class="max-w-4xl mx-auto">

        <!-- BUTTON -->
        <div class="no-print flex justify-end mb-6">

            <button
                onclick="window.print()"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl">

                Cetak Resep

            </button>

        </div>

        <!-- DOKUMEN -->
        <div class="print-area bg-white shadow-lg rounded-2xl overflow-hidden">

            <!-- HEADER -->
            <div class="border-b-4 border-black p-6">

                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">

                        <img
                            src="{{ asset('images/poltek.png') }}"
                            class="w-16 h-16 object-contain">

                        <div>

                            <h1 class="text-2xl font-bold">
                                KLINIK POLIBATAM
                            </h1>

                            <p class="text-slate-600">
                                Sistem Layanan Klinik Digital
                            </p>

                            <p class="text-sm text-slate-500">
                                Politeknik Negeri Batam
                            </p>

                        </div>

                    </div>

                    <div class="text-right">

                        <h2 class="text-2xl font-bold">
                            RESEP
                        </h2>

                        <p class="text-sm text-slate-500">
                            No. {{ $rekamMedis->id }}/KLP/{{ date('Y') }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- JUDUL -->
            <div class="py-6 text-center">

                <h2 class="text-xl font-bold">

                    RESEP OBAT PASIEN

                </h2>

            </div>

            <!-- IDENTITAS PASIEN -->
            <div class="px-8">

                <div class="border rounded-xl p-6 bg-slate-50">

                    <h3 class="font-bold mb-5">

                        Informasi Pasien

                    </h3>

                    <div class="grid grid-cols-2 gap-4">

                        <div>

                            <span class="text-slate-500">
                                Nama Pasien
                            </span>

                            <p class="font-semibold">
                                {{ $rekamMedis->jadwal->pasien->name }}
                            </p>

                        </div>

                        <div>

                            <span class="text-slate-500">
                                Nomor Rekam Medis
                            </span>

                            <p class="font-semibold">
                                {{ $rekamMedis->jadwal->pasien->no_rm }}
                            </p>

                        </div>

                        <div>

                            <span class="text-slate-500">
                                Tanggal Pemeriksaan
                            </span>

                            <p class="font-semibold">
                                {{ $rekamMedis->created_at->format('d F Y') }}
                            </p>

                        </div>

                        <div>

                            <span class="text-slate-500">
                                Dokter
                            </span>

                            <p class="font-semibold">
                                Dr. {{ Auth::user()->name }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RESEP -->
            <div class="p-8">

                <h3 class="font-bold border-b pb-3 mb-5">

                    Daftar Obat

                </h3>

                <table class="w-full border">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="border p-3 text-left">
                                No
                            </th>

                            <th class="border p-3 text-left">
                                Nama Obat
                            </th>

                            <th class="border p-3 text-left">
                                Dosis / Jumlah
                            </th>

                            <th class="border p-3 text-left">
                                Aturan Pakai
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($rekamMedis->resepObat as $index => $resep)

                        <tr>

                            <td class="border p-3">
                                {{ $index + 1 }}
                            </td>

                            <td class="border p-3 font-serif italic text-lg">
                                {{ $resep->nama_obat }}
                            </td>

                            <td class="border p-3">
                                {{ $resep->jumlah }}
                            </td>

                            <td class="border p-3">
                                {{ $resep->aturan_pakai }}
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <!-- CATATAN -->
            <div class="px-8 pb-6">

                <h3 class="font-bold border-b pb-3 mb-3">

                    Catatan Dokter

                </h3>

                <p class="text-slate-700">

                    Obat dapat ditebus di apotek sesuai resep yang diberikan.
                    Apabila keluhan tidak membaik, pasien dianjurkan untuk melakukan kontrol ulang.

                </p>

            </div>

            <!-- TTD -->
            <div class="px-8 pb-10">

                <div class="flex justify-end">

                    <div class="text-center">

                        <p>

                            Batam,
                            {{ date('d F Y') }}

                        </p>

                        <p class="mt-16 font-semibold">

                            Dr. {{ Auth::user()->name }}

                        </p>

                        <p class="text-sm text-slate-500">

                            Dokter Pemeriksa

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>