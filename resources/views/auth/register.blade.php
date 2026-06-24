<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar - Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
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

<body class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gray-50">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/images/gedung.png" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 backdrop-blur-sm bg-white/30"></div>

    <!-- CARD REGISTER -->
    <div class="relative z-10 w-full max-w-md mx-4">
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 card-animate border border-white/20">

            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h2>
                <p class="text-gray-500 text-sm mt-1">Isi data diri Anda dengan benar</p>
            </div>

            {{-- ERROR --}}
            @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-3 rounded-lg mb-5 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="/register" method="POST" onsubmit="return validatePassword()">
                @csrf

                <!-- NAMA -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-user text-gray-400 mr-2"></i> Nama Lengkap
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Masukkan nama Anda" required>
                </div>

                <!-- NIK -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-id-card text-gray-400 mr-2"></i> NIK (16 digit)
                    </label>
                    <input type="text" name="nik" maxlength="16" minlength="16" value="{{ old('nik') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Masukkan NIK" required>
                </div>

                <!-- EMAIL -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i> Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="contoh@gmail.com" required>
                </div>

                <!-- PASSWORD -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-lock text-gray-400 mr-2"></i> Kata Sandi
                    </label>
                    <input type="password" name="password"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Minimal 8 karakter" required>
                    <p class="text-xs text-gray-400 mt-1">* Gunakan kombinasi huruf, angka, atau simbol</p>
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-1 text-sm">
                        <i class="fas fa-check-circle text-gray-400 mr-2"></i> Konfirmasi Sandi
                    </label>
                    <input type="password" id="confirm_password"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white transition"
                        placeholder="Ulangi kata sandi" required>
                    <p id="errorPassword" class="text-red-500 text-xs mt-1 hidden">✗ Kata sandi tidak cocok</p>
                </div>

                <!-- TOMBOL -->
                <div class="grid grid-cols-2 gap-3 mt-2">
                    <a href="/login"
                        class="text-center py-2.5 rounded-xl border border-gray-300 text-gray-600 font-medium hover:bg-gray-100 transition">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 to-green-500 text-white py-2.5 rounded-xl font-semibold shadow-md hover:shadow-lg hover:scale-[1.02] transition">
                        Daftar
                    </button>
                </div>

                
            </form>
        </div>
    </div>

    <script>
        function validatePassword() {
            const password = document.querySelector('input[name="password"]').value;
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

</html>