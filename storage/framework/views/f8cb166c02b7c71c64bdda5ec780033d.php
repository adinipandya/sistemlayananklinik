<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klinik Polibatam</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    

    <!-- Style tambahan -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* glowing button */
        .glow:hover {
            box-shadow: 0 0 20px rgba(59,130,246,0.6);
        }
    </style>
</head>

<body class="bg-gray-50">

<!-- NAVBAR -->
<nav class="bg-white shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        
        <div class="flex items-center gap-2">
            <img src="/images/poltek.png" class="w-8 h-8">
            <h1 class="font-bold text-lg whitespace-nowrap">Klinik Polibatam</h1>
        </div>

        <div class="hidden md:flex gap-6 items-center">
            <a href="#" class="hover:text-blue-500">Beranda</a>
            <a href="#layanan" class="hover:text-blue-500">Layanan</a>
            <a href="#Ulasan" class="hover:text-blue-500">Ulasan</a>
            <a href="/login" class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-4 py-2 rounded-lg glow transition">
                Masuk
            </a>
        </div>

        <button id="menuBtn" class="md:hidden text-2xl">☰</button>
    </div>

    <div id="mobileMenu" class="hidden flex flex-col bg-white px-6 pb-4 md:hidden">
        <a href="#" class="py-2">Beranda</a>
        <a href="#layanan" class="py-2">Layanan</a>
        <a href="#testimoni" class="py-2">Tentang Kami</a>
        <a href="/login" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-center mt-2">Masuk</a>
    </div>
</nav>

<!-- HERO -->
<section class="pt-32 pb-20 text-center text-white relative overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
        <img src="/images/Gedung.png" 
             class="w-full h-full object-cover blur-sm scale-110">
    </div>
    <div class="absolute inset-0 bg-black/50"></div>

   // content
    <div class="relative z-10">

        <h1 class="text-4xl font-bold mb-4" data-aos="fade-up">
            Selamat datang di Klinik Polibatam
        </h1>

        <p class="mb-6" data-aos="fade-up" data-aos-delay="200">
            Kelola kesehatan Anda dengan mudah dan modern
        </p>

        <div class="space-x-4" data-aos="zoom-in" data-aos-delay="400">
            <a href="/login" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:scale-105 transition glow">
                Buat Janji
            </a>

            <a href="#layanan" class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-blue-500 transition">
                Lihat Layanan
            </a>
        </div>

    </div>
</section>

// layanan
<section id="layanan" class="py-16 px-6 text-center">
    <h2 class="text-3xl font-bold mb-10" data-aos="fade-up">Layanan Kami</h2>

    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

        <div data-aos="fade-up" class="bg-gradient-to-r from-blue-500 to-green-400 text-white p-6 rounded-xl shadow-lg hover:-translate-y-3 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3">📅</div>
            <h3 class="font-bold text-lg mb-2">Booking Online</h3>
            <p>Pesan tanpa antre</p>
        </div>

        <div data-aos="fade-up" data-aos-delay="200" class="bg-gradient-to-r from-blue-500 to-green-400 text-white p-6 rounded-xl shadow-lg hover:-translate-y-3 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3">💬</div>
            <h3 class="font-bold text-lg mb-2">Konsultasi</h3>
            <p>Dengan dokter terpercaya</p>
        </div>

        <div data-aos="fade-up" data-aos-delay="400" class="bg-gradient-to-r from-blue-500 to-green-400 text-white p-6 rounded-xl shadow-lg hover:-translate-y-3 hover:scale-105 transition duration-300">
            <div class="text-4xl mb-3">📄</div>
            <h3 class="font-bold text-lg mb-2">Rekam Medis</h3>
            <p>Aman & tersimpan</p>
        </div>

    </div>
</section>

//  obat
<section class="py-16 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-center mb-4">
            Obat yang Tersedia
        </h2>

        <div class="text-center mb-10">
            <a href="/obat" class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-4 py-2 rounded-lg glow transition">
                Pesan Sekarang
            </a>
        </div>

        <!-- CARD OBAT -->
        <div class="grid md:grid-cols-3 gap-8">

            <!-- OBAT 1 -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                
                <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                    Pereda Nyeri
                </div>

                <div class="p-4">
                    <h3 class="font-semibold">Acetaminophen</h3>
                    <p class="text-black font-bold mt-1">Rp. 500.000</p>
                </div>

            </div>

            <!-- OBAT 2 -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                
                <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                    Antibiotik
                </div>

                <div class="p-4">
                    <h3 class="font-semibold">Amoxicillin</h3>
                    <p class="text-black font-bold mt-1">Rp. 150.000</p>
                </div>

            </div>

            <!-- OBAT 3 -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                
                <div class="h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                    Vitamin
                </div>

                <div class="p-4">
                    <h3 class="font-semibold">Vitamin D</h3>
                    <p class="text-black font-bold mt-1">Rp. 300.000</p>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- TESTIMONI -->
<section id="Ulasan" class="bg-gradient-to-r from-blue-100 to-green-100 py-16 text-center">
    <h2 class="text-3xl font-bold mb-10" data-aos="fade-up">Umpan Balik Pasien</h2>

    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">

        <div data-aos="zoom-in" class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
            <h3 class="font-bold">Dini ⭐⭐⭐⭐⭐</h3>
            <p>Pelayanan sangat baik!</p>
        </div>

        <div data-aos="zoom-in" data-aos-delay="200" class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
            <h3 class="font-bold">Ardi ⭐⭐⭐⭐⭐</h3>
            <p>Cepat dan efisien</p>
        </div>

        <div data-aos="zoom-in" data-aos-delay="400" class="bg-white p-6 rounded-xl shadow hover:scale-105 transition">
            <h3 class="font-bold">Ihsan ⭐⭐⭐⭐⭐</h3>
            <p>Dokter sangat ramah</p>
        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-16 text-center">
    <h2 class="text-2xl font-bold mb-4" data-aos="fade-up">
        Mulai Sekarang 
    </h2>

    <a href="/login" data-aos="zoom-in" class="bg-gradient-to-r from-blue-500 to-green-500 text-white px-8 py-3 rounded-lg hover:scale-110 transition glow">
        Daftar Sekarang
    </a>
</section>

<!-- FOOTER -->
<footer class="bg-gray-800 text-white text-center py-6">
    ©️ 2026 Klinik Polibatam
</footer>

<!-- SCRIPT -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init({ duration: 1000, once: true });

document.getElementById("menuBtn").onclick = function() {
    document.getElementById("mobileMenu").classList.toggle("hidden");
};
</script>

</body>
</html><?php /**PATH C:\laragon\www\sistemlayananklinik\resources\views/pages/home.blade.php ENDPATH**/ ?>