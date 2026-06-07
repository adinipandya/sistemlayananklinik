<?php $__env->startSection('content'); ?>

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
            <?php echo e($feedback->count()); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">

        <p class="text-sm opacity-90">
            Menunggu Respon
        </p>

        <h2 class="text-4xl font-bold mt-2">
            <?php echo e($feedback->where('status','Menunggu')->count()); ?>

        </h2>

    </div>

    <div class="bg-white border border-slate-200 rounded-xl p-5">
        
        <p class="text-sm opacity-90">
            Sudah Direspon
        </p>

        <h2 class="text-4xl font-bold mt-2">
            <?php echo e($feedback->where('status','Direspon')->count()); ?>

        </h2>

    </div>

</div>

<!-- FEEDBACK LIST -->
<div class="grid lg:grid-cols-2 gap-6">

    <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-lg transition">

        <!-- HEADER -->
        <div class="p-5 border-b">

            <div class="flex justify-between items-center">

                <div>

                    <h3 class="font-semibold text-slate-800">
                        <?php echo e($item->user->name ?? '-'); ?>

                    </h3>

                    <p class="text-sm text-slate-500">
                        <?php echo e($item->kategori); ?>

                    </p>

                </div>

                <span class="text-yellow-500 font-semibold">

                    <i class="bi bi-star-fill"></i>

                    <?php echo e($item->rating); ?>/5

                </span>

            </div>

        </div>

        <!-- KOMENTAR -->
        <div class="p-5">

            <p class="text-slate-700 leading-relaxed">
                "<?php echo e($item->komentar); ?>"
            </p>

        </div>

        <!-- RESPON -->
        <?php if($item->status == 'Direspon'): ?>

        <div class="mx-5 mb-5 bg-green-50 border border-green-200 rounded-xl p-4">

            <p class="text-xs text-green-600 font-semibold mb-2">

                RESPON ADMIN

            </p>

            <p class="text-sm text-slate-700">

                <?php echo e($item->respon); ?>


            </p>

        </div>

        <?php endif; ?>

        <!-- FOOTER -->
        <div class="px-5 pb-5 flex justify-between items-center">

            <?php if($item->status == 'Menunggu'): ?>

            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

                Menunggu Respon

            </span>

            <?php else: ?>

            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

                Sudah Direspon

            </span>

            <?php endif; ?>

            <?php if($item->status == 'Menunggu'): ?>

            <button
                onclick="openResponseModal(<?php echo e($item->id); ?>)"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl flex items-center gap-2">

                <i class="bi bi-reply-fill"></i>

                Respon

            </button>

            <?php else: ?>

            <button
                onclick="openDetailResponse('<?php echo e(addslashes($item->respon)); ?>')"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl flex items-center gap-2">

                <i class="bi bi-eye-fill"></i>

                Lihat

            </button>

            <?php endif; ?>

        </div>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<!-- MODAL RESPON -->
<div id="responseModal"
class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl p-6 w-full max-w-lg">

        <h2 class="text-xl font-bold mb-4">

            Respon Feedback Pasien

        </h2>

        <form id="responseForm" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/admin/feedback.blade.php ENDPATH**/ ?>