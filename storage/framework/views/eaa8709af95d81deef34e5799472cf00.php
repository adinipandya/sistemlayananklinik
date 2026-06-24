<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Kata Sandi - Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .card-animate {
            animation: slideUp 0.5s ease-out;
        }
        input:focus {
            box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
            border-color: #3b82f6;
            outline: none;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- BACKGROUND (tetap) -->
    <div class="absolute inset-0">
        <img src="/images/gedung.png" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30"></div>

    <!-- CARD RESET PASSWORD -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 card-animate border border-white/20">

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-green-400 rounded-2xl shadow-lg mb-4">
                    <i class="fas fa-key text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Reset Kata Sandi</h2>
                <p class="text-gray-500 text-sm mt-1">Masukkan email dan kata sandi baru Anda</p>
            </div>

            
            <?php if(session('success')): ?>
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-3 rounded-lg mb-5 text-sm">
                <i class="fas fa-check-circle mr-2"></i> <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            
            <?php if(session('error')): ?>
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 rounded-lg mb-5 text-sm">
                <i class="fas fa-exclamation-circle mr-2"></i> <?php echo e(session('error')); ?>

            </div>
            <?php endif; ?>

            <form action="/forgot_password" method="POST">
                <?php echo csrf_field(); ?>

                <!-- EMAIL -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i> Email
                    </label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="contoh@gmail.com" required>
                </div>

                <div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1 text-sm">
        <i class="fas fa-id-card text-gray-400 mr-2"></i> NIK
    </label>

    <input
        type="text"
        name="nik"
        maxlength="16"
        value="<?php echo e(old('nik')); ?>"
        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50"
        placeholder="Masukkan 16 digit NIK"
        required>
</div>

                <!-- PASSWORD BARU -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-lock text-gray-400 mr-2"></i> Kata Sandi Baru
                    </label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Minimal 8 karakter" required>
                </div>

                <!-- KONFIRMASI -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-check-circle text-gray-400 mr-2"></i> Konfirmasi Sandi Baru
                    </label>
                    <input type="password" name="password_confirmation"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Ulangi kata sandi baru" required>
                </div>

                <!-- TOMBOL -->
                <div class="grid grid-cols-2 gap-3">
                    <a href="/login"
                        class="text-center py-2.5 rounded-xl border border-gray-300 text-gray-600 font-medium hover:bg-gray-100 transition">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-green-500 text-white py-2.5 rounded-xl font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html><?php /**PATH D:\laravel\sistemlayananklinik\sistemlayananklinik\resources\views/auth/forgot_password.blade.php ENDPATH**/ ?>