<?php $__env->startSection('content'); ?>

<h1 class="text-3xl font-bold mb-6" data-aos="fade-down">
    Booking Jadwal 🩺
</h1>

<div class="grid md:grid-cols-2 gap-6">

    <!-- FORM -->
    <div data-aos="fade-right"
    class="bg-white p-6 rounded-xl shadow-md">

        <h2 class="font-bold text-lg mb-4">Form Booking</h2>

        <form class="space-y-4">

            <!-- PILIH DOKTER -->
            <div>
                <label class="font-semibold">Pilih Dokter</label>
                <select class="w-full mt-1 p-2 border rounded-lg">
                    <option>Dr. Ardi</option>
                    <option>Dr. Dini</option>
                    <option>Dr. Ihsan</option>
                </select>
            </div>

            <!-- TANGGAL -->
            <div>
                <label class="font-semibold">Tanggal</label>
                <input type="date" class="w-full mt-1 p-2 border rounded-lg">
            </div>

            <!-- JAM -->
            <div>
                <label class="font-semibold">Jam</label>
                <select class="w-full mt-1 p-2 border rounded-lg">
                    <option>08:00</option>
                    <option>10:00</option>
                    <option>13:00</option>
                    <option>15:00</option>
                </select>
            </div>

            <!-- BUTTON -->
            <button type="button"
            onclick="showSuccess()"
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
            <li>✔ Pilih dokter sesuai kebutuhan</li>
            <li>✔ Datang 10 menit sebelum jadwal</li>
            <li>✔ Bawa kartu identitas</li>
        </ul>

    </div>

</div>

<!-- POPUP SUCCESS -->
<div id="popup"
class="hidden fixed inset-0 bg-black/40 flex items-center justify-center">

    <div class="bg-white p-6 rounded-xl text-center shadow-lg animate-popup">
        <h2 class="text-xl font-bold mb-2">✅ Berhasil!</h2>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pasien', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/pasien/booking.blade.php ENDPATH**/ ?>