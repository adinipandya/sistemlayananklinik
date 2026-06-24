
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Rekam Medis Pasien</title>

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

<div class="max-w-5xl mx-auto">

    <!-- BUTTON -->
    <div class="no-print flex justify-end mb-6">

        <button
            onclick="window.print()"
            class="bg-blue-600 text-white px-6 py-3 rounded-xl">

            Cetak Dokumen

        </button>

    </div>

    <!-- DOKUMEN -->
    <div
        class="print-area bg-white shadow-lg rounded-2xl overflow-hidden">

        <!-- HEADER -->
        <div class="border-b-4 border-black-600 p-5">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-4">

                    <img
                        src="<?php echo e(asset('images/poltek.png')); ?>"
                        class="w-14 h-14 object-contain">

                    <div>

                        <h1 class="text-xl font-bold">
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

                    <p class="font-semibold">
                        No. RM
                    </p>

                    <h2 class="text-2xl font-bold">
                        RM001
                    </h2>

                </div>

            </div>

        </div>

        <!-- TITLE -->
        <div class="px-8 py-6">

            <h2 class="text-lg font-bold text-center">

                REKAM MEDIS PASIEN

            </h2>

        </div>

        <!-- IDENTITAS -->
        <div class="px-8">

            <div
                class="bg-slate-50 rounded-xl p-6 border">

                <h3 class="font-bold mb-5">
                    Informasi Pasien
                </h3>

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <span class="text-slate-500">
                            Nama Pasien
                        </span>
                        <p class="font-semibold">
                            Ihsan
                        </p>
                    </div>

                    <div>
                        <span class="text-slate-500">
                            Umur
                        </span>
                        <p class="font-semibold">
                            21 Tahun
                        </p>
                    </div>

                    <div>
                        <span class="text-slate-500">
                            Jenis Kelamin
                        </span>
                        <p class="font-semibold">
                            Laki-Laki
                        </p>
                    </div>

                    <div>
                        <span class="text-slate-500">
                            Tanggal Pemeriksaan
                        </span>
                        <p class="font-semibold">
                            20 April 2026
                        </p>
                    </div>

                </div>

            </div>

        </div>

        <!-- ISI -->
        <div class="p-5 space-y-3">

            <!-- KELUHAN -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Keluhan Utama

                </h3>

                <p>
                    Demam tinggi, batuk dan pilek selama 3 hari.
                </p>

            </div>

            <!-- PEMERIKSAAN -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Pemeriksaan Fisik

                </h3>

                <table class="w-full border">

                    <tr>
                        <td class="border p-3 w-1/2">
                            Tekanan Darah
                        </td>
                        <td class="border p-2">
                            120/80
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">
                            Suhu Tubuh
                        </td>
                        <td class="border p-2">
                            38.2°C
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">
                            Berat Badan
                        </td>
                        <td class="border p-2">
                            65 Kg
                        </td>
                    </tr>

                    <tr>
                        <td class="border p-2">
                            Tinggi Badan
                        </td>
                        <td class="border p-2">
                            170 Cm
                        </td>
                    </tr>

                </table>

            </div>

            <!-- DIAGNOSA -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Diagnosis

                </h3>

                <p>
                    Influenza Ringan (ISPA Ringan)
                </p>

            </div>

            <!-- TINDAKAN -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Tindakan Medis

                </h3>

                <p>
                    Edukasi pasien, istirahat cukup dan observasi selama 3 hari.
                </p>

            </div>

            <!-- RESEP -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Resep Obat

                </h3>

                <table class="w-full border">

                    <thead class="bg-slate-100">

                        <tr>

                            <th class="border p-2 text-left">
                                Obat
                            </th>

                            <th class="border p-2 text-left">
                                Dosis
                            </th>

                            <th class="border p-2 text-left">
                                Aturan Pakai
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td class="border p-2">
                                Paracetamol
                            </td>

                            <td class="border p-2">
                                500mg
                            </td>

                            <td class="border p-2">
                                3x1
                            </td>

                        </tr>

                        <tr>

                            <td class="border p-2">
                                Vitamin C
                            </td>

                            <td class="border p-2">
                                500mg
                            </td>

                            <td class="border p-2">
                                1x1
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <!-- CATATAN -->
            <div>

                <h3
                    class="font-bold border-b pb-2 mb-3">

                    Catatan Dokter

                </h3>

                <p>
                    Pasien dianjurkan kontrol kembali apabila kondisi tidak membaik dalam 3 hari.
                </p>

            </div>

        </div>

        <!-- TTD -->
        <div class="px-8 pb-10">

            <div class="flex justify-end">

                <div class="text-center">

                    <p>
                        Batam,
                        <?php echo e(date('d F Y')); ?>

                    </p>

                    <p class="mt-12 font-semibold">

                        Dr. <?php echo e(Auth::user()->name); ?>


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

<?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/dokter/print_rekam.blade.php ENDPATH**/ ?>