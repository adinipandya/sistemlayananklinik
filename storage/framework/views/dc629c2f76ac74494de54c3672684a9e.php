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

    <h2 class="text-2xl font-bold text-center mb-2">Daftar</h2>
    <p class="text-center text-gray-500 mb-6">
        Buat akun untuk mulai menggunakan layanan kami.
    </p>

    <form action="/register" method="POST" onsubmit="return validatePassword()">
        <?php echo csrf_field(); ?>

        <div class="mb-4">
            <label>Nama</label>
            <input type="text" name="nama"
            class="w-full border p-3 rounded-lg"
            placeholder="Masukkan nama Anda">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email"
            class="w-full border p-3 rounded-lg"
            placeholder="Masukkan email Anda">
        </div>

        <div class="mb-4">
            <label>Kata Sandi</label>
            <input type="password" name="password"
            class="w-full border p-3 rounded-lg"
            placeholder="Masukkan kata sandi">
        </div>

        <div class="mb-4">
            <label>Konfirmasi Kata Sandi</label>
            <input type="password" id="confirm_password"
            class="w-full border p-3 rounded-lg"
            placeholder="Ulangi kata sandi">
            <p id="errorPassword" class="text-red-500 text-sm mt-1 hidden">
                Kata sandi tidak cocok
            </p>
        </div>

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
</html><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/auth/register.blade.php ENDPATH**/ ?>