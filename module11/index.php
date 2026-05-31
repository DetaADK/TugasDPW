<?php
include("koneksi.php");

$countDosen = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) as total FROM tbl_dosen"))['total'];
$countMhs   = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) as total FROM tbl_mahasiswa"))['total'];
$countMK    = mysqli_fetch_assoc(mysqli_query($link, "SELECT COUNT(*) as total FROM tbl_matakuliah"))['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <!-- Tailwind -->
    <link rel="stylesheet" href="src/output.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Plus Jakarta Sans', sans-serif;
        }

        @keyframes slideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to   { transform: translateY(0);     opacity: 1; }
        }

        @keyframes fadeUp {
            from { transform: translateY(20px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        @keyframes rippleAnim {
            to { transform: scale(4); opacity: 0; }
        }

        @keyframes slideDownMenu {
            from { transform: translateY(-8px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        .animate-slide-down      { animation: slideDown .45s ease both; }
        .animate-fade-up         { animation: fadeUp .55s ease both; }
        .animate-slide-down-menu { animation: slideDownMenu .25s ease both; }

        .anim-d1 { animation-delay: .10s; }
        .anim-d2 { animation-delay: .20s; }
        .anim-d3 { animation-delay: .30s; }
        .anim-d4 { animation-delay: .40s; }
        .anim-d5 { animation-delay: .50s; }

        .glass {
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #4f46e5 100%);
        }

        .stripe-blue   { background: linear-gradient(90deg,#2563eb,#3b82f6); }
        .stripe-green  { background: linear-gradient(90deg,#059669,#10b981); }
        .stripe-purple { background: linear-gradient(90deg,#7c3aed,#8b5cf6); }

        .ripple {
            position: absolute;
            border-radius: 9999px;
            background: rgba(37,99,235,.18);
            transform: scale(0);
            animation: rippleAnim .55s linear;
            pointer-events: none;
        }

        /* Animasi 3 garis hamburger → X */
        .bar { transition: transform .3s ease, opacity .3s ease; }
        .open .bar-top    { transform: translateY(8px) rotate(45deg); }
        .open .bar-mid    { opacity: 0; transform: scaleX(0); }
        .open .bar-bottom { transform: translateY(-8px) rotate(-45deg); }
    </style>
</head>

<body class="bg-slate-50 min-h-screen font-sans text-slate-800 overflow-x-hidden">

    <!-- Background -->
    <div class="fixed inset-0 z-0 pointer-events-none"
        style="background:
            radial-gradient(circle at top left, rgba(37,99,235,.05), transparent 35%),
            radial-gradient(circle at bottom right, rgba(99,102,241,.05), transparent 35%);">
    </div>

    <!-- ── Navbar ── -->
    <nav class="glass sticky top-0 z-50 border-b border-blue-700 animate-slide-down">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

            <!-- Logo -->
            <a href="index.php" class="flex items-center gap-3 no-underline">
                <div>
                    <h1 class="font-extrabold text-blue-600 text-lg leading-none">SIA</h1>
                    <p class="text-xs text-slate-500">Sistem Informasi Akademik</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-2">
                <li>
                    <a href="index.php"
                    class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-semibold
                            hover:bg-blue-700 transition-all duration-300 shadow-md shadow-blue-500/20">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="view/dosen.php"
                        class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                                hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="view/mhs.php"
                    class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="view/matkul.php"
                      class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Mata Kuliah
                    </a>
                </li>
            </ul>

            <!-- Hamburger Button — mobile only -->
            <button id="hamburger"
                    class="md:hidden flex flex-col justify-center items-center w-10 h-10
                          rounded-xl hover:bg-blue-50 transition-colors duration-200 gap-1.5"
                    aria-label="Buka menu">
                <span class="bar bar-top    block w-5 h-0.5 bg-slate-700 rounded-full"></span>
                <span class="bar bar-mid    block w-5 h-0.5 bg-slate-700 rounded-full"></span>
                <span class="bar bar-bottom block w-5 h-0.5 bg-slate-700 rounded-full"></span>
            </button>
        </div>

        <!-- Mobile Dropdown -->
        <div id="mobile-menu" class="md:hidden hidden border-t border-blue-100">
            <ul class="flex flex-col px-4 py-3 gap-1 animate-slide-down-menu">
                <li>
                    <a href="index.php"
                      class="flex items-center gap-3 bg-blue-600 text-white px-4 py-3
                              rounded-xl text-sm font-semibold shadow-md shadow-blue-500/20">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="view/dosen.php"
                      class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="view/mhs.php"
                      class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="view/matkul.php"
                      class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Mata Kuliah
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ── Main ── -->
    <main class="relative z-10 max-w-7xl mx-auto px-6 py-10">

        <!-- Hero -->
        <section class="hero-gradient rounded-[32px] p-10 md:p-14 text-white bg-blue-600 shadow-2xl
                        shadow-blue-500/20 overflow-hidden relative animate-fade-up anim-d1">
            <div class="relative z-10">
                <span class="inline-flex items-center gap-2 bg-white/15 border border-white/20
                            text-white rounded-full px-4 py-1.5 text-xs font-bold tracking-widest uppercase mb-5">
                    ✦ Tahun Akademik
                    <?php echo date('Y'); ?>/<?php echo date('Y') + 1; ?>
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                    Dashboard Akademik
                </h1>
                <p class="text-white/90 text-lg max-w-2xl leading-relaxed">
                    Kelola data dosen, mahasiswa, dan mata kuliah
                    dengan tampilan modern, cepat, dan mudah digunakan.
                </p>
            </div>
        </section>

        <!-- Label -->
        <div class="mt-10 mb-5 animate-fade-up anim-d2">
            <p class="text-sm font-bold uppercase tracking-[3px] text-blue-600">Ringkasan Data</p>
        </div>

        <!-- Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Dosen -->
            <a href="view/dosen.php"
              onclick="createRipple(event,this)"
              class="group relative overflow-hidden bg-white/95 border border-slate-200
                      rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:shadow-blue-200/40
                      hover:-translate-y-2 transition-all duration-300 animate-fade-up anim-d3">
                <div class="absolute top-0 left-0 right-0 h-1 stripe-blue"></div>
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <p class="text-sm font-semibold text-slate-500 mb-3">Total Dosen</p>
                        <h2 class="stat-number text-5xl font-extrabold tracking-tight text-blue-600"
                            data-target="<?php echo $countDosen; ?>">0</h2>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-500">Lihat data dosen</p>
                    <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center
                                text-slate-500 group-hover:translate-x-1 group-hover:border-blue-300
                                transition-all duration-300">→</div>
                </div>
            </a>

            <!-- Mahasiswa -->
            <a href="view/mhs.php"
              onclick="createRipple(event,this)"
              class="group relative overflow-hidden bg-white/95 border border-slate-200
                      rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:shadow-emerald-200/40
                      hover:-translate-y-2 transition-all duration-300 animate-fade-up anim-d4">
                <div class="absolute top-0 left-0 right-0 h-1 stripe-green"></div>
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <p class="text-sm font-semibold text-slate-500 mb-3">Total Mahasiswa</p>
                        <h2 class="stat-number text-5xl font-extrabold tracking-tight text-emerald-600"
                            data-target="<?php echo $countMhs; ?>">0</h2>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-500">Lihat data mahasiswa</p>
                    <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center
                                text-slate-500 group-hover:translate-x-1 group-hover:border-emerald-300
                                transition-all duration-300">→</div>
                </div>
            </a>

            <!-- Mata Kuliah -->
            <a href="view/matkul.php"
              onclick="createRipple(event,this)"
              class="group relative overflow-hidden bg-white/95 border border-slate-200
                      rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:shadow-violet-200/40
                      hover:-translate-y-2 transition-all duration-300 animate-fade-up anim-d5">
                <div class="absolute top-0 left-0 right-0 h-1 stripe-purple"></div>
                <div class="flex items-start justify-between mb-8">
                    <div>
                        <p class="text-sm font-semibold text-slate-500 mb-3">Total Mata Kuliah</p>
                        <h2 class="stat-number text-5xl font-extrabold tracking-tight text-violet-600"
                            data-target="<?php echo $countMK; ?>">0</h2>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-slate-500">Lihat data mata kuliah</p>
                    <div class="w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center
                                text-slate-500 group-hover:translate-x-1 group-hover:border-violet-300
                                transition-all duration-300">→</div>
                </div>
            </a>

        </section>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 text-center py-8 text-sm text-slate-600">
        &copy; <?php echo date('Y'); ?>
        <span class="font-semibold text-blue-600">Sistem Informasi Akademik</span>
        — Modul 11 PHP Database (CRUD)
    </footer>

    <script>
        /* ── Hamburger toggle ── */
        const hamburger  = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');

        hamburger.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');
            if (isOpen) {
                mobileMenu.classList.add('hidden');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-label', 'Buka menu');
            } else {
                mobileMenu.classList.remove('hidden');
                hamburger.classList.add('open');
                hamburger.setAttribute('aria-label', 'Tutup menu');
            }
        });

        /* Tutup jika klik di luar navbar */
        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-label', 'Buka menu');
            }
        });

        /* ── Ripple ── */
        function createRipple(e, card) {
            const rect   = card.getBoundingClientRect();
            const size   = Math.max(rect.width, rect.height);
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.width  = ripple.style.height = `${size}px`;
            ripple.style.left   = `${e.clientX - rect.left - size / 2}px`;
            ripple.style.top    = `${e.clientY - rect.top  - size / 2}px`;
            card.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        }

        /* ── Count-up ── */
        document.querySelectorAll('.stat-number').forEach(el => {
            const target   = parseInt(el.dataset.target);
            const duration = 1000;
            let start      = null;

            function animate(timestamp) {
                if (!start) start = timestamp;
                const progress = Math.min((timestamp - start) / duration, 1);
                el.textContent = Math.floor(progress * target);
                if (progress < 1) requestAnimationFrame(animate);
                else el.textContent = target;
            }

            setTimeout(() => requestAnimationFrame(animate), 300);
        });
    </script>

</body>
</html>