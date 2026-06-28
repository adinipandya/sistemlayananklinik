<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Klinik Polibatam</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink: '#0F2D4A',
                        teal: '#0E9488',
                        mist: '#F8FAFC',
                        amber: '#F59E0B',
                        slate: '#64748B',
                    }
                }
            }
        }
    </script>

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: #fff;
        }

        .glow:hover {
            box-shadow: 0 10px 30px rgba(14, 148, 136, .25);
        }

        .card-hover {
            transition: all .25s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(15, 45, 74, .08);
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: all .35s ease;
        }

        .faq-body.open {
            opacity: 1;
        }

        .reveal {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-100 fixed w-full z-50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center gap-2">
                <img src="/images/poltek.png" class="w-9 h-9">
                <div class="leading-none">
                    <p class="text-ink font-extrabold text-sm">Klinik Polibatam</p>
                    <p class="text-slate text-[10px]">Politeknik Negeri Batam</p>
                </div>
            </div>

            <div class="hidden md:flex items-center gap-7 text-sm">
                <a href="#" class="text-ink font-semibold">Beranda</a>
                <a href="#cara-pakai" class="text-slate hover:text-ink transition-colors">Cara Pakai</a>
                <a href="#layanan" class="text-slate hover:text-ink transition-colors">Layanan</a>
                <a href="#ulasan" class="text-slate hover:text-ink transition-colors">Ulasan</a>
                <a href="/login"
                    class="bg-blue-600 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
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
    <section class="h-[500px] md:h-[500px] text-center text-white relative overflow-hidden flex items-center justify-center">

        <!-- BACKGROUND IMAGE -->
        <div class="absolute inset-0">
            <img src="/images/Gedung.png" class="w-full h-full object-cover blur-sm scale-110">
        </div>
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- CONTENT -->
        <div class="relative z-10 w-full flex flex-col items-center justify-center h-full translate-y-8">

            <h1 class="text-4xl font-bold mb-4" data-aos="fade-up">
                Selamat datang di Klinik Polibatam
            </h1>

            <p class="mb-6" data-aos="fade-up" data-aos-delay="200">
                Kelola kesehatan Anda dengan mudah dan modern
            </p>

            <div class="space-x-4" data-aos="zoom-in" data-aos-delay="400">
                <a href="/login"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:scale-105 transition glow">
                    Buat Janji
                </a>

                <a href="#layanan"
                    class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-blue-500 transition">
                    Lihat Layanan
                </a>
            </div>

        </div>
    </section>


    {{-- ─── CARA PAKAI ───────────────────────────────────────────── --}}
    <section id="cara-pakai" class="py-20 bg-white">
        <div class="mb-14 reveal" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-5">

                <div class="mb-14 reveal">
                    <span class="text-[11px] font-semibold tracking-widest text-ink uppercase">
                        Mulai dari sini
                    </span>

                    <h2 class="text-ink font-extrabold text-3xl md:text-4xl mt-2">
                        Tiga langkah, selesai.
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-6">

                    @php
                    $steps = [
                    ['n'=>'1','judul'=>'Daftar Akun','desc'=>'Buat akun dengan email kampus, lalu kirim pesan verifikasi ke admin via WhatsApp. Proses biasanya selesai dalam beberapa jam.','icon'=>'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
                    ['n'=>'2','judul'=>'Pilih Dokter & Jadwal','desc'=>'Lihat ketersediaan dokter secara real-time. Pilih tanggal dan slot waktu yang tersedia, lalu konfirmasi booking.','icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['n'=>'3','judul'=>'Datang & Konsultasi','desc'=>'Tunjukkan bukti booking di klinik. Setelah konsultasi, rekam medis tersimpan otomatis dan bisa diakses kapan saja.','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ]
                    @endphp

                    @foreach($steps as $i => $step)
                    <div class="relative reveal" style="transition-delay: {{ $i * 80 }}ms">
                        {{-- Dashed connector (hidden on last) --}}
                        @if(!$loop->last)
                        <div class="hidden md:block absolute top-5 left-[calc(50%+28px)]
                             w-[calc(100%-56px)] h-px"
                            style="background: repeating-linear-gradient(90deg,#0E9488 0,#0E9488 6px,transparent 6px,transparent 14px)">
                        </div>
                        @endif

                        <div class="bg-mist rounded-2xl p-7">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 rounded-xl bg-ink flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $step['icon'] }}" />
                                    </svg>
                                </div>
                                <span class="text-[11px] font-extrabold tracking-widest text-ink uppercase">Langkah {{ $step['n'] }}</span>
                            </div>
                            <h3 class="font-extrabold text-ink text-lg mb-2">{{ $step['judul'] }}</h3>
                            <p class="text-sm text-slate leading-relaxed">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
    </section>

    {{-- ─── LAYANAN ──────────────────────────────────────────────── --}}
    <section id="layanan" class="py-20 bg-mist">
        <div class="mb-12 reveal" data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-5">

                <div class="mb-12 reveal">
                    <span class="text-[11px] font-semibold tracking-widest text-ink uppercase">
                        Apa yang kami sediakan
                    </span>

                    <h2 class="text-ink font-extrabold text-3xl md:text-4xl mt-2">
                        Layanan Klinik
                    </h2>

                    <p class="text-slate text-sm mt-2 max-w-md">
                        Tersedia untuk mahasiswa, dosen, dan staf aktif Polibatam.
                        Cukup bawa KTM atau tanda pengenal kampus.
                    </p>
                </div>

                @php
                $layanan = [
                ['judul'=>'Pemeriksaan Umum', 'desc'=>'Keluhan demam, batuk, flu, dan penyakit ringan lainnya ditangani langsung oleh dokter.', 'bg'=>'bg-blue-50','fg'=>'text-blue-600','icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['judul'=>' Booking Konsultasi', 'desc'=>'Pemesanan jadwal konsultasi secara online dengan mudah dan cepat melalui portal pasien..','bg'=>'bg-green-50', 'fg'=>'text-green-600','icon'=>'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ['judul'=>'Rekam Medis',       'desc'=>'Riwayat kesehatan tersimpan digital dan bisa Anda akses kapan saja melalui portal pasien.','bg'=>'bg-purple-50', 'fg'=>'text-purple-600','icon'=>'M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                ]
                @endphp


                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5">
                    @foreach($layanan as $i => $item)
                    <div class="bg-white rounded-2xl p-6 card-hover border border-gray-100 reveal"
                        style="transition-delay: {{ ($i % 3) * 60 }}ms">
                        <div class="w-11 h-11 {{ $item['bg'] }} rounded-xl flex items-center justify-center mb-5">
                            <svg class="w-5 h-5 {{ $item['fg'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                            </svg>
                        </div>
                        <h3 class="font-extrabold text-ink mb-2">{{ $item['judul'] }}</h3>
                        <p class="text-sm text-slate leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                    @endforeach
                </div>

            </div>
    </section>

    {{-- ─── TESTIMONI ────────────────────────────────────────────── --}}
    <section id="ulasan" class="py-30 bg-mist">
        <div class="bg-white rounded-2xl p-6 card-hover border border-gray-100 reveal"
            data-aos="fade-up">
            <div class="max-w-6xl mx-auto px-5">

                <div class="mb-12 reveal">
                    <span class="text-[11px] font-semibold tracking-widest text-ink uppercase">
                        Kata mereka
                    </span>

                    <h2 class="text-ink font-extrabold text-3xl md:text-4xl mt-2">
                        Pengalaman Pasien
                    </h2>
                </div>

                <div class="grid md:grid-cols-3 gap-5">

                    @forelse($feedback as $i => $item)
                    <div class="bg-white rounded-2xl p-6 card-hover border border-gray-100 reveal"
                        style="transition-delay: {{ ($loop->index % 3) * 70 }}ms">

                        {{-- Stars --}}
                        <div class="flex gap-0.5 mb-4">
                            @for($s = 1; $s <= 5; $s++)
                                <svg class="w-4 h-4 {{ $s <= ($item->rating ?? 5) ? 'text-amber' : 'text-gray-200' }}"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                        </div>

                        <p class="text-sm text-gray-700 leading-relaxed mb-5">
                            "{{ \Illuminate\Support\Str::limit($item->komentar, 130) }}"
                        </p>

                        <div class="flex items-center gap-3 pt-4 border-t border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-ink flex items-center justify-center
                                text-white text-xs font-extrabold flex-shrink-0">
                                {{ strtoupper(substr($item->user->name ?? 'P', 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-ink">{{ $item->user->name ?? 'Pasien' }}</p>
                                <p class="text-xs text-slate">{{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="col-span-3 text-center py-16">
                        <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <p class="text-slate text-sm">Belum ada ulasan dari pasien.</p>
                    </div>
                    @endforelse

                </div>
            </div>
    </section>

    {{-- ─── FAQ ──────────────────────────────────────────────────── --}}
    <section class="py-20 bg-mist">
        <div class="max-w-3xl mx-auto px-5">

            <div class="mb-12 text-center reveal">
                <span class="text-[11px] font-semibold tracking-widest text-ink uppercase">
                    FAQ
                </span>

                <h2 class="text-ink font-extrabold text-3xl md:text-4xl mt-2">
                    Yang sering ditanya
                </h2>
            </div>

            @php
            $faqs = [
            ['q'=>'Apakah mahasiswa baru bisa langsung pakai layanan klinik?',
            'a'=>'Ya, semua mahasiswa aktif Polibatam bisa menggunakan layanan setelah registrasi dan verifikasi akun. Cukup tunjukkan KTM saat datang ke klinik.'],
            ['q'=>'Berapa biaya berobat di klinik?',
            'a'=>'Layanan dasar gratis untuk civitas akademika aktif. Beberapa tindakan atau obat tertentu mungkin dikenakan biaya sesuai kebijakan kampus.'],
            ['q'=>'Bagaimana kalau sakit di luar jam operasional?',
            'a'=>'Hubungi satuan pengamanan kampus untuk penanganan darurat ringan. Untuk kondisi serius, segera ke IGD rumah sakit terdekat.'],
            ['q'=>'Kenapa akun saya perlu diverifikasi manual?',
            'a'=>'Verifikasi dilakukan untuk memastikan hanya civitas akademika aktif yang dapat mengakses layanan. Proses ini biasanya selesai dalam beberapa jam kerja.'],
            ]
            @endphp

            <div class="space-y-3 reveal">
                @foreach($faqs as $i => $faq)
                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                    <button onclick="toggleFaq({{ $i }})"
                        class="w-full flex justify-between items-center px-6 py-4 text-left
                               hover:bg-mist transition-colors">
                        <span class="text-sm font-semibold text-ink pr-4">{{ $faq['q'] }}</span>
                        <svg id="faq-icon-{{ $i }}"
                            class="w-4 h-4 text-slate flex-shrink-0 transition-all duration-500 ease-out"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div id="faq-body-{{ $i }}" class="faq-body px-6">
                        <p class="text-sm text-slate leading-relaxed pb-5">{{ $faq['a'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA REGISTRASI & VERIFIKASI -->
    <section class="py-16 bg-mist">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800">Siap Gunakan Layanan Digital Kami?</h2>
            <p class="text-gray-600 mt-3 mb-8">Daftar sekarang dan nikmati kemudahan booking, rekam medis, dan konsultasi online.</p>
            <div class="flex flex-wrap justify-center gap-5">
                <a href="/register" class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold shadow-md hover:bg-blue-700 transition flex items-center gap-2">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    {{-- ─── FOOTER ───────────────────────────────────────────────── --}}
    <footer class="bg-ink text-white">
        <div class="max-w-6xl mx-auto px-5 py-12 grid md:grid-cols-3 gap-8 text-sm">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="flex items-center gap-2">
                        <img src="/images/poltek.png" class="w-8 h-8">
                    </div>
                    <span class="font-extrabold">Klinik Polibatam</span>
                </div>
                <p class="text-blue-200 text-xs leading-relaxed max-w-xs">
                    Sistem layanan kesehatan digital resmi Politeknik Batam untuk seluruh civitas akademika.
                </p>
            </div>
            <div>
                <p class="text-[10px] font-semibold tracking-widest text-blue-400 uppercase mb-3">Navigasi</p>
                <div class="space-y-2 text-blue-200">
                    <a href="#cara-pakai" class="block hover:text-white transition-colors">Cara Pakai</a>
                    <a href="#layanan" class="block hover:text-white transition-colors">Layanan</a>
                    <a href="#ulasan" class="block hover:text-white transition-colors">Ulasan Pasien</a>
                </div>
            </div>
            <div>
                <p class="text-[10px] font-semibold tracking-widest text-blue-400 uppercase mb-3">Kontak</p>
                <div class="space-y-2 text-xs text-blue-200">
                    <p>📍 Gedung Pusat Polibatam, Lantai 1</p>
                    <p>🕗 Sen–Jum 08.00–20.00 · Sabtu 08.00–17.00</p>
                    <p>📞 (0778) 469 858 ext. Klinik</p>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 py-4 text-center text-xs text-blue-400">
            © 2026 Klinik Politeknik Batam. Semua hak dilindungi.
        </div>
    </footer>

    <!-- SCRIPT -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });

        document.getElementById("menuBtn").onclick = function() {
            document.getElementById("mobileMenu").classList.toggle("hidden");
        };

        function toggleFaq(id) {

            const body = document.getElementById(`faq-body-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);

            const isOpen = body.classList.contains('open');

            document.querySelectorAll('.faq-body').forEach(el => {
                el.classList.remove('open');
                el.style.maxHeight = null;
            });

            document.querySelectorAll('[id^="faq-icon-"]').forEach(el => {
                el.classList.remove('rotate-180');
            });

            if (!isOpen) {
                body.classList.add('open');
                body.style.maxHeight = body.scrollHeight + 'px';
                icon.classList.add('rotate-180');
            }

            // Obat search
            document.getElementById('obat-search').addEventListener('input', function() {
                const q = this.value.toLowerCase().trim();
                const cards = document.querySelectorAll('.obat-card');
                let any = false;
                cards.forEach(c => {
                    const match = c.dataset.nama.includes(q);
                    c.classList.toggle('hidden-card', !match);
                    if (match) any = true;
                });
                document.getElementById('obat-empty').classList.toggle('hidden', any);
            });
        }
    </script>

</body>

</html>