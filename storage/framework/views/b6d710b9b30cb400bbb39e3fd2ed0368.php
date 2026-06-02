<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Jadwal Konsultasi 🗓️
</h1>

<div data-aos="fade-up" class="bg-white rounded-xl shadow-md p-6 overflow-x-auto">

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="p-3">Dokter</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Jam</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">

            <!-- ROW 1 -->
            <tr class="hover:bg-gray-50 transition">
                <td class="p-3">Dr. Ihsan</td>
                <td class="p-3">2026-04-25</td>
                <td class="p-3">10:00</td>

                <td class="p-3">
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Menunggu
                    </span>
                </td>

                <td class="p-3">
                    <button class="text-red-500 hover:underline">
                        Batalkan
                    </button>
                </td>
            </tr>

            <!-- ROW 2 -->
            <tr class="hover:bg-gray-50 transition">
                <td class="p-3">Dr. Ardi</td>
                <td class="p-3">2026-04-20</td>
                <td class="p-3">08:00</td>

                <td class="p-3">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Selesai
                    </span>
                </td>

                <td class="p-3">
                    <button class="text-blue-500 hover:underline">
                        Detail
                    </button>
                </td>
            </tr>

        </tbody>
    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/jadwal_pasien.blade.php ENDPATH**/ ?>