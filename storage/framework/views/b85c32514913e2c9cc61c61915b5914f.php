<?php $__env->startSection('content'); ?>

<h1 class="text-2xl font-bold mb-6 animate-fadeInUp">
    Jadwal Dokter 📅
</h1>

<!-- CARD -->
<div class="bg-white p-6 rounded-xl shadow hover:shadow-2xl transition duration-300 animate-fadeInUp delay-1">

    <h2 class="text-lg font-semibold mb-4">Jadwal Hari Ini</h2>

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="py-3">Jam</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <!-- ROW -->
            <tr class="border-b hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">08:00</td>
                <td>Ihsan</td>
                <td>Demam</td>

                <td>
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm animate-pulse">
                        Menunggu
                    </span>
                </td>

                <td>
                    <a href="/dokter/konsultasi" 
                       class="text-blue-500 font-medium hover:text-green-500 hover:scale-110 transition duration-200 inline-block">
                        Mulai →
                    </a>
                </td>
            </tr>

            <!-- ROW -->
            <tr class="border-b hover:bg-green-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">09:00</td>
                <td>Ardi</td>
                <td>Batuk</td>

                <td>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Selesai
                    </span>
                </td>

                <td>
                    <span class="text-gray-400">-</span>
                </td>
            </tr>

            <!-- ROW -->
            <tr class="hover:bg-blue-50 hover:scale-[1.01] transition duration-200">
                <td class="py-3">10:00</td>
                <td>Dini</td>
                <td>Sakit Kepala</td>

                <td>
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm animate-pulse">
                        Menunggu
                    </span>
                </td>

                <td>
                    <a href="/dokter/konsultasi" 
                       class="text-blue-500 font-medium hover:text-green-500 hover:scale-110 transition duration-200 inline-block">
                        Mulai →
                    </a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dokter', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/dokter/jadwal_dokter.blade.php ENDPATH**/ ?>