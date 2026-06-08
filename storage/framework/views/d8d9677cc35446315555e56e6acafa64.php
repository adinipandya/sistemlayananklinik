<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes popup {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(20px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .animate-popup {
            animation: popup 0.4s ease;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/images/gedung.png" class="w-full h-full object-cover">
    </div>

    <!-- OVERLAY -->
    <div class="absolute inset-0 backdrop-blur-sm bg-white/40"></div>

    <!-- CARD -->
    <div class="relative z-10 bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md animate-popup">

        <h2 class="text-2xl font-bold text-center mb-2">
            Daftar
        </h2>

        <p class="text-center text-gray-500 mb-6">
            Buat akun untuk mulai menggunakan layanan kami.
        </p>

        
        <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <ul class="text-sm">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        
        <form action="/register" method="POST" onsubmit="return validatePassword()">
            <?php echo csrf_field(); ?>

            <!-- NAMA -->
            <div class="mb-4">
                <label>
                    Nama
                </label>

                <input type="text" name="name" class="w-full border p-3 rounded-lg" placeholder="Masukkan nama Anda"
                    required>
            </div>

            <!-- NIK -->
            <div class="mb-4">

                <label>
                    NIK
                </label>

                <input type="text" name="nik" maxlength="16" class="w-full border p-3 rounded-lg"
                    placeholder="Masukkan NIK" required>

            </div>

            <!-- NO HP -->
            <div class="mb-4">

                <label>
                    No HP
                </label>

                <input type="text" name="no_hp" class="w-full border p-3 rounded-lg" placeholder="08xxxxxxxxxx"
                    required>

            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label>
                    Kata Sandi
                </label>

                <input type="password" name="password" class="w-full border p-3 rounded-lg"
                    placeholder="Masukkan kata sandi" required>
            </div>

            <!-- KONFIRMASI -->
            <div class="mb-4">
                <label>
                    Konfirmasi Kata Sandi
                </label>

                <input type="password" id="confirm_password" class="w-full border p-3 rounded-lg"
                    placeholder="Ulangi kata sandi" required>

                <p id="errorPassword" class="text-red-500 text-sm mt-1 hidden">
                    Kata sandi tidak cocok
                </p>
            </div>

            <!-- BUTTON -->
            <div class="grid grid-cols-2 gap-3 mt-6">

                <a href="/login"
                    class="text-center py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                    Kembali
                </a>

                <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-3 rounded-lg hover:scale-105 hover:shadow-lg transition duration-300">
                    Daftar
                </button>

            </div>

        </form>

    </div>

    <script>
        function validatePassword() {

            const password = document.querySelector('input[name=\"password\"]').value;

            const confirm = document.getElementById('confirm_password').value;

            const error = document.getElementById('errorPassword');

            if (password !== confirm) {
                error.classList.remove('hidden');
                return false;
            }

            error.classList.add('hidden');

            return true;
        }
    </script>

</body>

</html><?php /**PATH C:\laragon\www\sistemlayananklinik\resources\views/auth/register.blade.php ENDPATH**/ ?>