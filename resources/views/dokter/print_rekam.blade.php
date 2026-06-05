<!DOCTYPE html>
<html>

<head>
    <title>Rekam Medis Pasien</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

</head>

<body class="bg-slate-100 p-10">

<div class="max-w-4xl mx-auto bg-white p-10 shadow">

    <!-- HEADER -->
    <div class="text-center border-b pb-5 mb-6">

        <h1 class="text-3xl font-bold">
            KLINIK POLIBATAM
        </h1>

        <p class="text-slate-500">
            Sistem Layanan Klinik Digital
        </p>

    </div>

    <h2 class="text-xl font-semibold mb-6">
        REKAM MEDIS PASIEN
    </h2>

    <!-- IDENTITAS -->
    <div class="grid grid-cols-2 gap-4 mb-8">

        <p><b>No RM :</b> RM001</p>
        <p><b>Nama :</b> Ihsan</p>

        <p><b>Umur :</b> 21 Tahun</p>
        <p><b>Jenis Kelamin :</b> Laki-Laki</p>

        <p><b>Dokter :</b> Dr. Ardi</p>
        <p><b>Tanggal :</b> 20 April 2026</p>

    </div>

    <!-- KELUHAN -->
    <div class="mb-6">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Keluhan Utama
        </h3>

        <p>
            Demam tinggi, batuk dan pilek selama 3 hari.
        </p>

    </div>

    <!-- PEMERIKSAAN -->
    <div class="mb-6">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Pemeriksaan Fisik
        </h3>

        <table class="w-full border">

            <tr>
                <td class="border p-2">Tekanan Darah</td>
                <td class="border p-2">120/80</td>
            </tr>

            <tr>
                <td class="border p-2">Suhu</td>
                <td class="border p-2">38.2 °C</td>
            </tr>

            <tr>
                <td class="border p-2">Berat Badan</td>
                <td class="border p-2">65 Kg</td>
            </tr>

            <tr>
                <td class="border p-2">Tinggi Badan</td>
                <td class="border p-2">170 Cm</td>
            </tr>

        </table>

    </div>

    <!-- DIAGNOSIS -->
    <div class="mb-6">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Diagnosis
        </h3>

        <p>
            Influenza ringan (ISPA ringan)
        </p>

    </div>

    <!-- TINDAKAN -->
    <div class="mb-6">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Tindakan Medis
        </h3>

        <p>
            Edukasi pasien dan istirahat cukup.
        </p>

    </div>

    <!-- RESEP -->
    <div class="mb-6">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Resep Obat
        </h3>

        <ul class="list-disc pl-6">
            <li>Paracetamol 500mg (3x1)</li>
            <li>Vitamin C 500mg (1x1)</li>
        </ul>

    </div>

    <!-- CATATAN -->
    <div class="mb-10">

        <h3 class="font-semibold border-b pb-2 mb-3">
            Catatan Dokter
        </h3>

        <p>
            Kontrol kembali apabila kondisi tidak membaik dalam 3 hari.
        </p>

    </div>

    <!-- TTD -->
    <div class="text-right mt-16">

        <p>Dokter Pemeriksa</p>

        <br><br><br>

        <p class="font-semibold">
            Dr. Ardi
        </p>

    </div>

</div>

<!-- BUTTON -->
<div class="text-center mt-6 no-print">

    <button
    onclick="window.print()"
    class="bg-blue-600 text-white px-6 py-3 rounded-lg">

        Cetak / Simpan PDF

    </button>

</div>

</body>
</html>