<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    <!-- LOGIN CARD -->
    <div class="relative z-10 bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md animate-popup">

        <h1 class="text-3xl font-bold text-center mb-2">
            Masuk
        </h1>

        <p class="text-gray-500 text-center mb-6">
            Akses akun Anda untuk mulai menggunakan layanan kami.
        </p>

        
        <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-4">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

        
        <form action="/login" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            <!-- EMAIL -->
            <div>
                <label class="font-semibold">
                    Email
                </label>

                <input type="email" name="email"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                    placeholder="Masukkan email Anda" required>
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="font-semibold">
                    Kata Sandi
                </label>

                <div class="relative mt-1">

                    <input id="password" type="password" name="password"
                        class="w-full px-4 py-2 pr-12 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                        placeholder="Masukkan kata sandi Anda" required>

                    <button type="button" onclick="togglePassword()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">
                        <i id="eyeIcon" class="bi bi-eye"></i>
                    </button>

                </div>
            </div>

            <!-- FORGOT -->
            <a href="/forgot_password" class="text-sm text-blue-500 hover:underline">
                Lupa Kata Sandi?
            </a>

            <!-- BUTTON -->
            <div class="grid grid-cols-2 gap-3 pt-4">

                <a href="/register"
                    class="text-center py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                    Daftar
                </a>

                <button type="submit"
                    class="bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg hover:scale-105 hover:shadow-lg transition">
                    Masuk
                </button>

            </div>

        </form>

    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        }
    </script>

</body>

</html><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/auth/login.blade.php ENDPATH**/ ?>