<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy:  '#1B3A5C',
                        teal:  '#2A9D8F',
                        sand:  '#F4A261',
                        mist:  '#F5F7FA',
                        slate: '#64748B',
                    },
                    fontFamily: {
                        display: ['"DM Serif Display"', 'serif'],
                        body:    ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Diagonal hero clip */
        .hero-clip {
            clip-path: polygon(0 0, 100% 0, 100% 88%, 0 100%);
        }

        /* Navbar scroll effect */
        .navbar-scroll {
            transition: box-shadow 0.3s ease, background 0.3s ease;
        }

        /* Status badge pulse */
        @keyframes pulse-green {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.4; }
        }
        .pulse-dot { animation: pulse-green 2s infinite; }

        /* Card hover lift */
        .card-lift {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(27,58,92,0.12);
        }

        /* FAQ accordion */
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s ease, padding 0.2s ease;
        }
        .faq-answer.open {
            max-height: 200px;
        }

        /* Diagonal divider */
        .divider-wave {
            background: #F5F7FA;
            clip-path: polygon(0 40%, 100% 0%, 100% 100%, 0% 100%);
            height: 80px;
            margin-top: -2px;
        }
    </style>
</head>

<body class="bg-white font-body text-gray-800">

<!-- ─── NAVBAR ──────────────────────────────────────────────────── -->
<nav id="navbar" class="navbar-scroll bg-white fixed w-full z-50 border-b border-gray-100">
    <div class="max-w-6xl mx-auto px-6 py-3 flex justify-between items-center">

        <a href="/" class="flex items-center gap-3 group">
            <div class="w-8 h-8 rounded-lg text-ink flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <div>
                <span class="font-display text-navy text-sm font-semibold leading-none block">Klinik</span>
                <span class="text-xs text-slate leading-none">Politeknik Batam</span>
            </div>
        </a>

        <!-- Desktop menu -->
        <div class="hidden md:flex items-center gap-8">
            <a href="/" class="text-sm text-navy font-medium border-b-2 border-teal pb-0.5">Beranda</a>
            <a href="/layanan" class="text-sm text-slate hover:text-navy transition-colors">Layanan</a>
            <a href="/about" class="text-sm text-slate hover:text-navy transition-colors">Tentang</a>
            <a href="/jadwal" class="text-sm text-slate hover:text-navy transition-colors">Jadwal Dokter</a>
        </div>

        <div class="flex items-center gap-3">
            <!-- Live status badge -->
            <div id="status-badge" class="hidden md:flex items-center gap-1.5 text-xs font-medium px-3 py-1.5 rounded-full bg-mist border border-gray-200">
                <span id="status-dot" class="w-2 h-2 rounded-full bg-gray-400"></span>
                <span id="status-text" class="text-slate">Memuat...</span>
            </div>
            <a href="/login"
               class="text-sm font-medium bg-navy text-white px-5 py-2 rounded-lg hover:text-ink transition-colors">
               Masuk
            </a>
        </div>
    </div>
</nav>

<!-- ─── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-clip bg-navy pt-28 pb-40 relative overflow-hidden">

    <!-- Background texture -->
    <div class="absolute inset-0 opacity-5"
         style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 28px 28px;">
    </div>

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center relative z-10">

        <!-- LEFT: Text -->
        <div data-aos="fade-right">
            <span class="inline-block text-xs font-semibold tracking-widest text-ink uppercase mb-5">
                Layanan Kesehatan Kampus
            </span>
            <h1 class="font-display text-white text-5xl md:text-6xl leading-tight mb-6">
                Sehat di kampus,<br>
                <em class="not-italic text-sand">tanpa ribet.</em>
            </h1>
            <p class="text-blue-200 text-base leading-relaxed mb-10 max-w-md">
                Klinik resmi Politeknik Batam melayani mahasiswa, dosen, dan staf.
                Konsultasi, pemeriksaan, hingga rujukan — semua dalam satu tempat.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="/daftar"
                   class="inline-flex items-center gap-2 text-ink text-white font-medium px-6 py-3 rounded-lg hover:bg-opacity-90 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Buat Janji
                </a>
                <a href="/layanan"
                   class="inline-flex items-center gap-2 border border-white/30 text-white font-medium px-6 py-3 rounded-lg hover:border-white/70 transition-all">
                    Lihat Layanan
                </a>
            </div>
        </div>

        <!-- RIGHT: Quick info card -->
        <div data-aos="fade-left" data-aos-delay="150">
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 space-y-5">

                <p class="text-xs font-semibold tracking-widest text-ink uppercase">Jam Operasional</p>

                <div class="space-y-3">
                    <div class="flex justify-between items-center py-2 border-b border-white/10">
                        <span class="text-sm text-blue-100">Senin – Jumat</span>
                        <span class="text-sm font-semibold text-white">08.00 – 16.00</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-white/10">
                        <span class="text-sm text-blue-100">Sabtu</span>
                        <span class="text-sm font-semibold text-white">08.00 – 12.00</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-sm text-blue-100">Minggu & Libur</span>
                        <span class="text-sm font-medium text-blue-300">Tutup</span>
                    </div>
                </div>

                <div class="bg-white/10 rounded-xl p-4 flex items-start gap-3">
                    <svg class="w-5 h-5 text-sand flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div>
                        <p class="text-white text-sm font-medium">Gedung Pusat Polibatam</p>
                        <p class="text-blue-200 text-xs mt-0.5">Lantai 1, dekat pintu utama</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Diagonal gap -->
<div class="divider-wave"></div>

<!-- ─── STATISTIK ─────────────────────────────────────────────── -->
<section class="bg-mist py-12 -mt-2">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up">

            @php
                $stats = [
                    ['value' => '1.200+', 'label' => 'Pasien per Tahun',    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                    ['value' => '4',       'label' => 'Dokter & Tenaga Medis','icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['value' => '6',       'label' => 'Jenis Layanan',       'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                    ['value' => '< 30m',   'label' => 'Rata-rata Tunggu',    'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                ]
            @endphp

            @foreach($stats as $stat)
            <div class="bg-white rounded-xl p-5 card-lift border border-gray-100">
                <div class="w-10 h-10 text-ink/10 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-ink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $stat['icon'] }}"/>
                    </svg>
                </div>
                <p class="font-display text-3xl text-navy">{{ $stat['value'] }}</p>
                <p class="text-xs text-slate mt-1">{{ $stat['label'] }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- ─── LAYANAN ───────────────────────────────────────────────── -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-12" data-aos="fade-up">
            <span class="text-xs font-semibold tracking-widest text-ink uppercase">Apa yang kami layani</span>
            <h2 class="font-display text-navy text-4xl mt-3">Layanan Klinik</h2>
            <p class="text-slate mt-3 max-w-lg text-sm leading-relaxed">
                Tersedia untuk seluruh civitas akademika Polibatam. Cukup bawa kartu identitas kampus.
            </p>
        </div>

        @php
            $layanan = [
                ['judul' => 'Pemeriksaan Umum',   'desc' => 'Konsultasi keluhan kesehatan, pemeriksaan fisik, dan penanganan awal.',          'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'warna' => 'bg-blue-50 text-blue-600'],
                ['judul' => 'Surat Keterangan',   'desc' => 'Surat sakit, surat sehat, dan dokumen resmi lainnya untuk keperluan akademik.', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'warna' => 'text-ink-50 text-ink-600'],
                ['judul' => 'Obat-obatan',        'desc' => 'Pemberian obat untuk penyakit ringan sesuai resep dokter klinik.',              'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'warna' => 'bg-orange-50 text-orange-500'],
                ['judul' => 'Rujukan',            'desc' => 'Bantuan rujukan ke rumah sakit mitra jika membutuhkan penanganan lanjutan.',     'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'warna' => 'bg-purple-50 text-purple-600'],
                ['judul' => 'Kesehatan Mental',   'desc' => 'Konseling ringan dan skrining awal tekanan psikologis bersama konselor.',        'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'warna' => 'bg-pink-50 text-pink-500'],
                ['judul' => 'P3K & Darurat',      'desc' => 'Penanganan luka, pingsan, atau kondisi darurat ringan di area kampus.',          'icon' => 'M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z', 'warna' => 'bg-red-50 text-red-500'],
            ]
        @endphp

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($layanan as $i => $item)
            <div class="card-lift border border-gray-100 rounded-xl p-6"
                 data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                <div class="w-11 h-11 {{ $item['warna'] }} rounded-xl flex items-center justify-center mb-5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-navy mb-2">{{ $item['judul'] }}</h3>
                <p class="text-sm text-slate leading-relaxed">{{ $item['desc'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ─── TESTIMONI / FEEDBACK ─────────────────────────────────── -->
@if(isset($feedback) && $feedback->count() > 0)
<section class="py-20 bg-mist">
    <div class="max-w-6xl mx-auto px-6">

        <div class="mb-12" data-aos="fade-up">
            <span class="text-xs font-semibold tracking-widest text-ink uppercase">Kata mereka</span>
            <h2 class="font-display text-navy text-4xl mt-3">Pengalaman Pasien</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($feedback->take(3) as $i => $item)
            <div class="bg-white rounded-xl p-6 card-lift border border-gray-100"
                 data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <!-- Quote mark -->
                <svg class="w-7 h-7 text-ink/30 mb-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p class="text-sm text-gray-700 leading-relaxed mb-5">"{{ Str::limit($item->pesan, 120) }}"</p>
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                    <div class="w-8 h-8 rounded-full text-ink flex items-center justify-center text-white text-xs font-semibold">
                        {{ strtoupper(substr($item->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-navy">{{ $item->user->name ?? 'Anonim' }}</p>
                        <p class="text-xs text-slate">{{ $item->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- ─── FAQ RINGKAS ───────────────────────────────────────────── -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <div class="mb-12 text-center" data-aos="fade-up">
            <span class="text-xs font-semibold tracking-widest text-ink uppercase">Pertanyaan Umum</span>
            <h2 class="font-display text-navy text-4xl mt-3">Yang sering ditanya</h2>
        </div>

        @php
            $faqs = [
                ['q' => 'Apakah mahasiswa baru bisa langsung menggunakan layanan klinik?',
                 'a' => 'Ya, semua mahasiswa aktif Polibatam langsung dapat menggunakan layanan dengan menunjukkan KTM (Kartu Tanda Mahasiswa) atau bukti registrasi aktif.'],
                ['q' => 'Apakah biaya berobat dikenakan kepada mahasiswa?',
                 'a' => 'Layanan dasar di klinik gratis untuk mahasiswa, dosen, dan staf aktif Polibatam. Untuk obat-obatan tertentu atau tindakan khusus, mungkin dikenakan biaya sesuai ketentuan kampus.'],
                ['q' => 'Bagaimana jika sakit di luar jam operasional?',
                 'a' => 'Silakan menghubungi UKM atau satuan pengamanan kampus untuk penanganan darurat. Untuk kondisi berat, segera ke IGD rumah sakit terdekat.'],
                ['q' => 'Apakah bisa membuat janji temu sebelumnya?',
                 'a' => 'Bisa. Login ke portal ini dan pilih menu "Buat Janji" untuk memilih jadwal dan dokter yang tersedia.'],
            ]
        @endphp

        <div class="space-y-3" data-aos="fade-up" data-aos-delay="100">
            @foreach($faqs as $i => $faq)
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button onclick="toggleFaq({{ $i }})"
                        class="w-full flex justify-between items-center px-6 py-4 text-left hover:bg-mist transition-colors">
                    <span class="text-sm font-medium text-navy">{{ $faq['q'] }}</span>
                    <svg id="faq-icon-{{ $i }}"
                         class="w-4 h-4 text-slate flex-shrink-0 ml-4 transition-transform"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="faq-answer-{{ $i }}" class="faq-answer px-6">
                    <p class="text-sm text-slate leading-relaxed pb-4">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ─── CTA BAWAH ─────────────────────────────────────────────── -->
<section class="bg-navy py-16">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <h2 class="font-display text-white text-4xl mb-4">Butuh bantuan medis?</h2>
        <p class="text-blue-200 text-sm mb-8">Jangan tunda. Klinik kami ada untuk civitas Polibatam.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="/daftar"
               class="inline-flex items-center gap-2 text-ink text-white font-medium px-7 py-3 rounded-lg hover:bg-opacity-90 transition-all">
                Buat Janji Sekarang
            </a>
            <a href="/about"
               class="inline-flex items-center gap-2 border border-white/30 text-white font-medium px-7 py-3 rounded-lg hover:border-white/60 transition-all">
                Tentang Klinik
            </a>
        </div>
    </div>
</section>

<!-- ─── FOOTER ────────────────────────────────────────────────── -->
<footer class="bg-gray-900 text-gray-400">
    <div class="max-w-6xl mx-auto px-6 py-10 grid md:grid-cols-3 gap-8 text-sm">

        <div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-7 h-7 rounded-md text-ink flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <span class="font-display text-white">Klinik Polibatam</span>
            </div>
            <p class="text-xs leading-relaxed">Layanan kesehatan resmi Politeknik Batam untuk seluruh civitas akademika.</p>
        </div>

        <div>
            <p class="text-xs font-semibold tracking-widest text-gray-500 uppercase mb-3">Navigasi</p>
            <div class="space-y-2">
                <a href="/" class="block hover:text-white transition-colors">Beranda</a>
                <a href="/layanan" class="block hover:text-white transition-colors">Layanan</a>
                <a href="/jadwal" class="block hover:text-white transition-colors">Jadwal Dokter</a>
                <a href="/about" class="block hover:text-white transition-colors">Tentang Kami</a>
            </div>
        </div>

        <div>
            <p class="text-xs font-semibold tracking-widest text-gray-500 uppercase mb-3">Kontak</p>
            <div class="space-y-2 text-xs">
                <p>📍 Gedung Pusat Polibatam, Lt. 1</p>
                <p>🕗 Senin–Jumat, 08.00–16.00</p>
                <p>📞 (0778) 469 858 ext. Klinik</p>
            </div>
        </div>

    </div>
    <div class="border-t border-gray-800 py-4 text-center text-xs text-gray-600">
        © 2026 Klinik Politeknik Batam. Semua hak dilindungi.
    </div>
</footer>


<!-- ─── SCRIPTS ───────────────────────────────────────────────── -->
<script>
    // AOS
    AOS.init({ duration: 700, once: true, offset: 60 });

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        nav.style.boxShadow = window.scrollY > 10
            ? '0 2px 20px rgba(0,0,0,0.08)'
            : 'none';
    });

    // Live status badge
    function updateStatus() {
        const now   = new Date();
        const day   = now.getDay();   // 0=Sun, 6=Sat
        const hour  = now.getHours();
        const min   = now.getMinutes();
        const time  = hour * 60 + min;

        const badge = document.getElementById('status-badge');
        const dot   = document.getElementById('status-dot');
        const text  = document.getElementById('status-text');

        let isOpen = false;
        if (day >= 1 && day <= 5 && time >= 8*60 && time < 16*60) isOpen = true;
        if (day === 6          && time >= 8*60 && time < 12*60) isOpen = true;

        badge.classList.remove('hidden');

        if (isOpen) {
            dot.classList.add('pulse-dot');
            dot.className = 'w-2 h-2 rounded-full bg-green-500 pulse-dot';
            text.className = 'text-green-700 font-semibold';
            text.textContent = 'Buka sekarang';
        } else {
            dot.className = 'w-2 h-2 rounded-full bg-gray-400';
            text.className = 'text-slate';
            text.textContent = 'Sedang tutup';
        }
    }
    updateStatus();
    setInterval(updateStatus, 60000);

    // FAQ accordion
    function toggleFaq(i) {
        const answer = document.getElementById('faq-answer-' + i);
        const icon   = document.getElementById('faq-icon-' + i);

        const isOpen = answer.classList.contains('open');

        // Close all
        document.querySelectorAll('.faq-answer').forEach(el => el.classList.remove('open'));
        document.querySelectorAll('[id^="faq-icon-"]').forEach(el => el.style.transform = '');

        if (!isOpen) {
            answer.classList.add('open');
            icon.style.transform = 'rotate(180deg)';
        }
    }
</script>

@yield('scripts')
</body>
</html>