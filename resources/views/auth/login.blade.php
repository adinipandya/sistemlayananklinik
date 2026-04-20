<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes popup {
            from {
                opacity: 0;
                transform: scale(0.85) translateY(30px);
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

    <!-- BACKGROUND GRADIENT -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-green-400 to-white"></div>

    <!-- BLUR EFFECT -->
    <div class="absolute inset-0 backdrop-blur-2xl opacity-70"></div>

    <!-- LOGIN CARD -->
    <div class="relative z-10 bg-white p-5 rounded-2xl shadow-2xl w-full max-w-md animate-popup">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold text-center mb-2">Masuk</h1>
        <p class="text-gray-500 text-center mb-6">
            Akses akun Anda untuk mulai menggunakan layanan kami.
        </p>

        <!-- FORM -->
        <form onsubmit="return handleLogin(event)" class="space-y-4">

            <!-- EMAIL -->
            <div>
                <label class="font-semibold">Email</label>
                <input type="email"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                placeholder="Masukkan email Anda">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="font-semibold">Kata Sandi</label>
                <input type="password"
                class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                placeholder="Masukkan kata sandi Anda">
            </div>

            <!-- ROLE -->
            <div>
                <label class="font-semibold">Tipe Pengguna</label>

                <div class="flex gap-3 mt-2">
                    <button type="button" onclick="selectRole(this)"
                    class="role-btn px-4 py-2 bg-gray-200 rounded-lg hover:bg-blue-500 hover:text-white transition">
                        Pasien
                    </button>

                    <button type="button" onclick="selectRole(this)"
                    class="role-btn px-4 py-2 bg-gray-200 rounded-lg hover:bg-blue-500 hover:text-white transition">
                        Dokter
                    </button>

                    <button type="button" onclick="selectRole(this)"
                    class="role-btn px-4 py-2 bg-gray-200 rounded-lg hover:bg-blue-500 hover:text-white transition">
                        Admin
                    </button>
                </div>

                <input type="hidden" name="role" id="role">
                <p class="text-sm text-gray-400 mt-1">Pilih peran Anda</p>
            </div>

            <!-- FORGOT -->
            <div class="text-sm text-gray-500">
                Lupa Kata Sandi?
            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-4">

                <a href="#"
                class="w-1/2 text-center border border-black py-2 rounded-lg hover:bg-gray-200 transition">
                    Daftar
                </a>

                <button type="submit"
                class="w-1/2 bg-gradient-to-r from-blue-500 to-green-400 text-white py-2 rounded-lg hover:scale-105 hover:shadow-lg transition duration-300">
                    Masuk
                </button>

            </div>

        </form>
    </div>

    <!-- SCRIPT -->
    <script>
    function selectRole(el) {
        document.querySelectorAll('.role-btn').forEach(btn => {
            btn.classList.remove('bg-blue-500','text-white');
            btn.classList.add('bg-gray-200');
        });

        el.classList.remove('bg-gray-200');
        el.classList.add('bg-blue-500','text-white');

        document.getElementById('role').value = el.innerText;
    }
    function handleLogin(e) {
    e.preventDefault();

    let role = document.getElementById('role').value;

    if (!role) {
        alert("Pilih role dulu!");
        return false;
    }

    if (role === "Admin") {
        window.location.href = "/admin";
    } 
    else if (role === "Dokter") {
        window.location.href = "/dokter";
    } 
    else {
        window.location.href = "/pasien";
    }
}
</script>
    </script>

</body>
</html>