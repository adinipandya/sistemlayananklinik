<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Masuk - Klinik Polibatam</title>

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

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/images/gedung.png" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30"></div>

    <!-- LOGIN CARD -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 card-animate border border-white/20">

            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-green-400 rounded-2xl shadow-lg mb-4">
                    <i class="fas fa-stethoscope text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Selamat Datang Kembali</h2>
                <p class="text-gray-500 text-sm mt-1">Masuk ke akun Klinik Polibatam</p>
            </div>

            {{-- ERROR --}}
            @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 rounded-lg mb-5 text-sm">
                <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            </div>
            @endif

            <form action="/login" method="POST">
                @csrf

                <!-- EMAIL -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i> Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="contoh@gmail.com" required>
                </div>

                <!-- PASSWORD + TOGGLE -->
                <div class="mb-3">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-lock text-gray-400 mr-2"></i> Kata Sandi
                    </label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition pr-10"
                            placeholder="Masukkan sandi" required>
                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Lupa password -->
                <div class="text-right mb-5">
                    <a href="/forgot_password" class="text-sm text-blue-500 hover:underline">
                        Lupa kata sandi?
                    </a>
                </div>

                <!-- TOMBOL -->
                <div class="grid grid-cols-2 gap-3">
                    <a href="/register"
                        class="text-center py-2.5 rounded-xl border border-gray-300 text-gray-600 font-medium hover:bg-gray-100 transition">
                        <i class="fas fa-user-plus mr-1"></i> Daftar
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-green-500 text-white py-2.5 rounded-xl font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                        Masuk
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>