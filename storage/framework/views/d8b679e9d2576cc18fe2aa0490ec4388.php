<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <h1 class="text-3xl font-bold text-center mb-2">
        Reset Password
    </h1>

    <p class="text-gray-500 text-center mb-6">
        Masukkan password baru Anda.
    </p>

    <form action="/reset_password" method="POST" class="space-y-4">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="email" value="<?php echo e(request('email')); ?>">

    <!-- PASSWORD BARU -->
    <div>
        <label class="font-semibold">
            Password Baru
        </label>

        <input 
            type="password"
            name="password"
            class="w-full mt-1 px-4 py-2 border rounded-lg"
            placeholder="Masukkan password baru"
            required
        >
    </div>

</div>

</body>
</html><?php /**PATH /Users/ardiansyah/laravel/sistemlayananklinik/resources/views/auth/reset_password.blade.php ENDPATH**/ ?>