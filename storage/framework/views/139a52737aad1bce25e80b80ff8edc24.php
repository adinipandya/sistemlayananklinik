<?php $__env->startSection('content'); ?>

<div class="flex items-center gap-4 mb-8"
     data-aos="fade-right">

    <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">

        <i data-feather="message-square"
           class="w-7 h-7 text-blue-600">
        </i>

    </div>

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Feedback Pasien
        </h1>

        <p class="text-slate-500">
            Berikan masukan dan penilaian terhadap layanan Klinik Polibatam
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
            Feedback Dikirim
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?php echo e($feedbackDikirim); ?>

        </h2>

    </div>

    <div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

        <p class="text-sm text-slate-500">
            Rating Rata-rata
        </p>

        <h2 class="text-3xl font-bold text-green-600 mt-2">
            <?php echo e($ratingRataRata); ?>

        </h2>

    </div>

    <div
data-aos="zoom-in"
class="bg-white border border-slate-200 rounded-xl p-5
hover:-translate-y-1
hover:shadow-xl
transition-all duration-300">

        <p class="text-sm text-slate-500">
            Feedback Direspon
        </p>

        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?php echo e($feedbackDirespon); ?>

        </h2>

    </div>


</div>

<div class="grid lg:grid-cols-2 gap-6 mb-8">


    <!-- FORM FEEDBACK -->
    <div
data-aos="fade-right"
class="bg-white border border-slate-200 rounded-xl p-6
hover:shadow-lg
transition-all duration-300">

        <h2 class="font-semibold text-lg mb-5">
            Kirim Feedback
        </h2>

        <form action="/pasien/feedback" method="POST">

            <?php echo csrf_field(); ?>

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Kategori
                </label>

                <select name="kategori" class="w-full border border-slate-300 rounded-lg p-3">

                    <option>Pelayanan Dokter</option>
                    <option>Pelayanan Klinik</option>
                    <option>Sistem Booking</option>
                    <option>Fasilitas Klinik</option>

                </select>

            </div>

            <div class="mb-4">

                <label class="block text-sm text-slate-600 mb-2">
                    Rating
                </label>

                <select name="rating" class="w-full border border-slate-300 rounded-lg p-3">

                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>

                </select>

            </div>

            <div class="mb-5">

                <label class="block text-sm text-slate-600 mb-2">
                    Komentar
                </label>

                <textarea name="komentar" rows="5" class="w-full border border-slate-300 rounded-lg p-3">
</textarea>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl
hover:shadow-lg
hover:scale-[1.02]
transition-all duration-300">
                Kirim Feedback
            </button>

        </form>

    </div>

    <!-- INFORMASI -->
    <div
data-aos="fade-left"
class="bg-white border border-slate-200 rounded-xl p-6
hover:shadow-lg
transition-all duration-300">

        <h2 class="font-semibold text-lg mb-5">
            Kenapa Feedback Penting?
        </h2>

        <div class="space-y-4 text-slate-600">

            <div class="border-l-4 border-blue-500 pl-4">

                Membantu klinik meningkatkan kualitas pelayanan.

            </div>

            <div class="border-l-4 border-green-500 pl-4">

                Menjadi bahan evaluasi dokter dan petugas klinik.

            </div>

            <div class="border-l-4 border-yellow-500 pl-4">

                Membantu pengembangan sistem layanan klinik.

            </div>

        </div>

    </div>


</div>

<!-- RIWAYAT FEEDBACK -->


<div
data-aos="fade-up"
data-aos-delay="200"
class="bg-white border border-slate-200 rounded-xl overflow-hidden">

    <div class="p-5 border-b">

        <h2 class="font-semibold text-slate-700">
            Riwayat Feedback
        </h2>

    </div>

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left p-4">
                    Tanggal
                </th>

                <th class="text-left p-4">
                    Kategori
                </th>

                <th class="text-left p-4">
                    Rating
                </th>

                <th class="text-left p-4">
                    Status
                </th>

                <th class="text-left p-4">
                    Komentar
                </th>

                <th class="text-left p-4">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr class="border-t">

                <td class="p-4">
                    <?php echo e($item->created_at->format('d M Y')); ?>

                </td>

                <td class="p-4">
                    <?php echo e($item->kategori); ?>

                </td>

                <td class="p-4">
                    <?php echo e(str_repeat('⭐', $item->rating)); ?>

                </td>

                <td class="p-4">

                    <?php if($item->status == 'Direspon'): ?>

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Direspon
                    </span>

                    <?php else: ?>

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                        Menunggu
                    </span>

                    <?php endif; ?>

                </td>
                <td class="p-4 max-w-xs">
    <?php echo e(\Illuminate\Support\Str::limit($item->komentar, 50)); ?>

</td>       

                <td class="p-4">

                    <div class="flex items-center gap-2">

                        <!-- DETAIL -->
                        <button type="button" onclick="openDetailModal(
        '<?php echo e($item->rating); ?>',
        '<?php echo e(addslashes($item->komentar)); ?>',
        '<?php echo e(addslashes($item->respon ?? 'Belum ada respon')); ?>'
        )" class="bg-blue-100 hover:bg-blue-200 p-2 rounded-lg
hover:scale-110
transition-all duration-300">

                            <i data-feather="eye" class="w-4 h-4 text-blue-600"></i>

                        </button>

                        <?php if($item->status == 'Menunggu'): ?>

                        <!-- EDIT -->
                        <button type="button" onclick="openEditModal(
        <?php echo e($item->id); ?>,
        '<?php echo e($item->kategori); ?>',
        '<?php echo e($item->rating); ?>',
        '<?php echo e(addslashes($item->komentar)); ?>'
        )" class="bg-yellow-100 hover:bg-yellow-200 p-2 rounded-lg
hover:scale-110
transition-all duration-300">

                            <i data-feather="edit-2" class="w-4 h-4 text-yellow-600"></i>

                        </button>

                        <!-- HAPUS -->
                        <form action="/pasien/feedback/<?php echo e($item->id); ?>" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus feedback ini?')">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button class="bg-red-100 hover:bg-red-200 p-2 rounded-lg
hover:scale-110
transition-all duration-300">

                                <i data-feather="trash-2" class="w-4 h-4 text-red-600"></i>

                            </button>

                        </form>

                        <?php endif; ?>

                    </div>

                </td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tr>

        </tbody>

    </table>


</div>

<!-- MODAL DETAIL -->

<div id="detailModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">


    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg">

        <div class="p-6 border-b">

            <h2 class="text-xl font-semibold">
                Detail Feedback
            </h2>

        </div>

        <div class="p-6">

            <div class="space-y-4">

                <div>

                    <p class="text-sm text-slate-500">
                        Rating
                    </p>

                    <p id="modalRating"></p>

                </div>

                <div>

                    <p class="text-sm text-slate-500">
                        Feedback
                    </p>

                    <p id="modalKomentar"></p>

                </div>

                <div>

                    <p class="text-sm text-slate-500">
                        Respon Klinik
                    </p>

                    <div id="modalRespon" class="bg-slate-50 border rounded-lg p-4">
                    </div>

                </div>

            </div>

            <div class="flex gap-3 mt-6">

                <button onclick="closeDetailModal()"
                    class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg transition">

                    Tutup

                </button>

            </div>

        </div>

    </div>


</div>

<div id="editModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">

    <div class="bg-white rounded-2xl w-full max-w-lg p-6">

        <h2 class="text-xl font-semibold mb-5">
            Edit Feedback
        </h2>

        <form id="editForm" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-4">

                <label>Kategori</label>

                <select id="editKategori" name="kategori" class="w-full border rounded-lg p-3">

                    <option>Pelayanan Dokter</option>
                    <option>Pelayanan Klinik</option>
                    <option>Sistem Booking</option>
                    <option>Fasilitas Klinik</option>

                </select>

            </div>

            <div class="mb-4">

                <label>Rating</label>

                <select id="editRating" name="rating" class="w-full border rounded-lg p-3">

                    <option value="5">⭐⭐⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="1">⭐</option>

                </select>

            </div>

            <div class="mb-5">

                <label>Komentar</label>

                <textarea id="editKomentar" name="komentar" rows="4" class="w-full border rounded-lg p-3"></textarea>

            </div>

            <div class="flex gap-3">

                <button type="submit" class="flex-1 bg-blue-600 text-white py-3 rounded-lg">

                    Simpan

                </button>

                <button type="button" onclick="closeEditModal()" class="flex-1 border py-3 rounded-lg">

                    Batal

                </button>

            </div>

        </form>

    </div>

</div>

<!-- POPUP -->

<div id="successPopup" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">


    <div class="bg-white rounded-2xl p-8 text-center shadow-xl w-full max-w-sm">

        <div class="text-5xl mb-3">
            ✅
        </div>

        <h2 class="text-xl font-bold mb-2">
            Feedback Berhasil Dikirim
        </h2>

        <p class="text-slate-500 mb-5">
            Terima kasih atas masukan Anda.
        </p>

        <button onclick="closeSuccess()" class="bg-blue-600 text-white px-6 py-3 rounded-lg">

            Tutup

        </button>

    </div>


</div>

<script>
    function openDetailModal(
        rating,
        komentar,
        respon
    ) {

        document
            .getElementById('modalRating')
            .innerHTML = '⭐'.repeat(rating);

        document
            .getElementById('modalKomentar')
            .innerText = komentar;

        document
            .getElementById('modalRespon')
            .innerText = respon;

        document
            .getElementById('detailModal')
            .classList.remove('hidden');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    function showSuccess() {
        document.getElementById('successPopup').classList.remove('hidden');
    }

    function closeSuccess() {
        document.getElementById('successPopup').classList.add('hidden');
    }

    function openEditModal(
        id,
        kategori,
        rating,
        komentar
    ) {

        document
            .getElementById('editForm')
            .action =
            '/pasien/feedback/' + id;

        document
            .getElementById('editKategori')
            .value = kategori;

        document
            .getElementById('editRating')
            .value = rating;

        document
            .getElementById('editKomentar')
            .value = komentar;

        document
            .getElementById('editModal')
            .classList.remove('hidden');
    }

    function closeEditModal() {

        document
            .getElementById('editModal')
            .classList.add('hidden');
    }

    feather.replace();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/pasien/feedback.blade.php ENDPATH**/ ?>