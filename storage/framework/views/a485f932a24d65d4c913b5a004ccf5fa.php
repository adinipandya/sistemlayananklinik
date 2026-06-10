<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lupa Kata Sandi - Klinik Polibatam</title>

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

        <h1 class="text-3xl font-bold text-center mb-2">
            Lupa Kata Sandi
        </h1>

        <p class="text-gray-500 text-center mb-6">
            Masukkan email Anda untuk reset kata sandi.
        </p>

        
        <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        
        <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

        <!-- FORM -->
        <form action="/forgot_password" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            <!-- EMAIL -->
            <div>
                <label class="font-semibold">
                    Email
                </label>

                <input type="email" name="email" class="w-full mt-1 px-4 py-2 border rounded-lg"
                    placeholder="Masukkan email" required>
            </div>

            <!-- PASSWORD BARU -->
            <div>
                <label class="font-semibold">
                    Password Baru
                </label>

                <input type="password" name="password" class="w-full mt-1 px-4 py-2 border rounded-lg"
                    placeholder="Masukkan password baru" required>
            </div>

            <!-- KONFIRMASI -->
            <div>
                <label class="font-semibold">
                    Konfirmasi Password
                </label>

                <input type="password" name="password_confirmation" class="w-full mt-1 px-4 py-2 border rounded-lg"
                    placeholder="Konfirmasi password" required>
            </div>

             <!-- BUTTON -->
        <div class="grid grid-cols-2 gap-3 mt-6">

            <a href="/login"
            class="text-center py-3 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                Kembali
            </a>

            <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-3 rounded-lg hover:scale-105 hover:shadow-lg transition duration-300">
                Simpan
            </button>

        </form>

    </div>

</body>

</html><?php /**PATH C:\laragon\www\sistemlayananklinik\resources\views/auth/forgot_password.blade.php ENDPATH**/ ?>