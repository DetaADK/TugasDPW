<?php
include '../koneksi.php';

$search      = "";
$whereClause = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search      = mysqli_real_escape_string($link, $_GET['search']);
    $whereClause = " WHERE namaMK LIKE '%$search%'";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah — SIA</title>
    <!-- Tailwind -->
    <link rel="stylesheet" href="../src/output.css">
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
        @keyframes slideDownMenu {
            from { transform: translateY(-8px); opacity: 0; }
            to   { transform: translateY(0);    opacity: 1; }
        }

        .animate-slide-down      { animation: slideDown .45s ease both; }
        .animate-fade-up         { animation: fadeUp .55s ease both; }
        .animate-slide-down-menu { animation: slideDownMenu .25s ease both; }

        .anim-d1 { animation-delay: .10s; }
        .anim-d2 { animation-delay: .20s; }
        .anim-d3 { animation-delay: .28s; }

        .glass {
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #4f46e5 100%);
        }

        .bar { transition: transform .3s ease, opacity .3s ease; }
        .open .bar-top    { transform: translateY(8px) rotate(45deg); }
        .open .bar-mid    { opacity: 0; transform: scaleX(0); }
        .open .bar-bottom { transform: translateY(-8px) rotate(-45deg); }

        .data-row:nth-child(even) { background: rgba(248,250,252,1); }
        .data-row:hover            { background: rgba(239,246,255,1); }
        .data-row { transition: background .15s ease; }
    </style>
</head>

<body class="bg-slate-50 min-h-screen font-sans text-slate-800 overflow-x-hidden">

    <!-- Background -->
    <div class="fixed inset-0 z-0 pointer-events-none"
         style="background:
            radial-gradient(circle at top left,    rgba(37,99,235,.05), transparent 35%),
            radial-gradient(circle at bottom right, rgba(99,102,241,.05), transparent 35%);">
    </div>

    <!-- ── Navbar ── -->
    <nav class="glass sticky top-0 z-50 border-b border-blue-700 animate-slide-down">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">

            <a href="../index.php" class="flex items-center gap-3 no-underline">
                <div>
                    <h1 class="font-extrabold text-blue-600 text-lg leading-none">SIA</h1>
                    <p class="text-xs text-slate-500">Sistem Informasi Akademik</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-2">
                <li>
                    <a href="../index.php"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="dosen.php"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="mhs.php"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="matkul.php"
                       class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-semibold
                              hover:bg-blue-700 transition-all duration-300 shadow-md shadow-blue-500/20">
                        Mata Kuliah
                    </a>
                </li>
            </ul>

            <!-- Hamburger -->
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
                    <a href="../index.php"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="dosen.php"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="mhs.php"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="matkul.php"
                       class="flex items-center gap-3 bg-blue-600 text-white px-4 py-3
                              rounded-xl text-sm font-semibold shadow-md shadow-blue-500/20">
                        Mata Kuliah
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ── Main ── -->
    <main class="relative z-10 max-w-7xl mx-auto px-6 py-10">

        <!-- Hero -->
        <section class="hero-gradient rounded-[32px] p-10 md:p-14 text-white bg-blue-700 shadow-2xl
                        shadow-blue-500/20 overflow-hidden relative animate-fade-up anim-d1">
            <div class="relative z-10">
                <span class="inline-flex items-center gap-2 bg-white/15 border border-white/20
                            text-white rounded-full px-4 py-1.5 text-xs font-bold tracking-widest uppercase mb-5">
                    Manajemen Data
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                    Data Mata Kuliah
                </h1>
                <p class="text-white/90 text-lg max-w-2xl leading-relaxed">
                    Kelola data mata kuliah di sistem informasi akademik.
                </p>
            </div>
        </section>

        <!-- Alert pesan sukses -->
        <?php if (isset($_GET['msg'])): ?>
        <div class="mt-6 flex items-center gap-3 bg-emerald-50 border border-emerald-200
                    text-emerald-700 rounded-2xl px-5 py-4 text-sm font-medium animate-fade-up anim-d2">
            <span class="text-lg">✅</span>
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
        <?php endif; ?>

        <!-- Card tabel -->
        <div class="mt-6 bg-white/95 border border-slate-200 rounded-3xl shadow-lg overflow-hidden
                    animate-fade-up anim-d3">

            <!-- Card Header -->
            <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row
                        sm:items-center gap-4 justify-between">

                <!-- Search -->
                <form method="GET" action="matkul.php"
                      class="flex items-center gap-2 w-full sm:max-w-sm">
                    <div class="relative flex-1">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm">🔍</span>
                        <input type="text" name="search"
                               placeholder="Cari nama mata kuliah..."
                               value="<?php echo htmlspecialchars($search); ?>"
                               class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-slate-200 text-sm
                                      text-slate-700 bg-white outline-none transition-all duration-200
                                      focus:border-blue-400 focus:ring-2 focus:ring-blue-100
                                      hover:border-slate-300">
                    </div>
                    <button type="submit"
                            class="px-4 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-semibold
                                   hover:bg-blue-700 transition-colors duration-200 shadow-md shadow-blue-500/20
                                   whitespace-nowrap">
                        Cari
                    </button>
                    <?php if ($search): ?>
                    <a href="matkul.php"
                       class="px-3 py-2.5 rounded-xl border border-slate-200 text-slate-500 text-sm
                              hover:bg-slate-50 transition-colors duration-200 whitespace-nowrap">
                        ✕
                    </a>
                    <?php endif; ?>
                </form>

                <!-- Tambah -->
                <a href="../input/matkul.php"
                   class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-xl
                          text-sm font-semibold hover:bg-blue-700 hover:-translate-y-0.5
                          transition-all duration-200 shadow-md shadow-blue-500/20 whitespace-nowrap">
                    + Tambah Mata Kuliah
                </a>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                Kode MK
                            </th>
                            <th class="text-left px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                Nama Mata Kuliah
                            </th>
                            <th class="text-center px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                SKS
                            </th>
                            <th class="text-center px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                Jam
                            </th>
                            <th class="text-center px-6 py-3.5 text-xs font-bold uppercase tracking-widest text-slate-400">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query  = "SELECT * FROM tbl_matakuliah" . $whereClause . " ORDER BY kodeMK ASC";
                        $result = mysqli_query($link, $query);

                        if (!$result) {
                            die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
                        }

                        if (mysqli_num_rows($result) > 0):
                            while ($data = mysqli_fetch_assoc($result)):
                        ?>
                        <tr class="data-row border-b border-slate-100 last:border-0">
                            <td class="px-6 py-4 font-mono text-xs text-slate-500">
                                <?php echo htmlspecialchars($data['kodeMK']); ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-700">
                                <?php echo htmlspecialchars($data['namaMK']); ?>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg
                                             bg-violet-50 text-violet-700 text-xs font-semibold min-w-[2rem]">
                                    <?php echo htmlspecialchars($data['sks']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center px-2.5 py-1 rounded-lg
                                             bg-blue-50 text-blue-700 text-xs font-semibold min-w-[2rem]">
                                    <?php echo htmlspecialchars($data['jam']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="../update/matkul.php?kodeMK=<?php echo urlencode($data['kodeMK']); ?>"
                                       class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                              bg-amber-50 text-amber-700 border border-amber-200
                                              hover:bg-amber-100 transition-colors duration-200">
                                        Edit
                                    </a>
                                    <a href="../delete/matkul.php?kodeMK=<?php echo urlencode($data['kodeMK']); ?>"
                                       onclick="return confirm('Anda yakin akan menghapus mata kuliah ini?')"
                                       class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                              bg-red-50 text-red-600 border border-red-200
                                              hover:bg-red-100 transition-colors duration-200">
                                        Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-3 text-slate-400">
                                    <span class="text-5xl">📭</span>
                                    <p class="text-sm font-medium">
                                        <?php if ($search): ?>
                                            Tidak ada data untuk pencarian
                                            "<span class="text-slate-600"><?php echo htmlspecialchars($search); ?></span>"
                                        <?php else: ?>
                                            Belum ada data mata kuliah
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($search): ?>
                                    <a href="matkul.php"
                                       class="text-blue-600 text-xs font-semibold hover:underline">
                                        Tampilkan semua data
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Footer tabel -->
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/60">
                <p class="text-xs text-slate-400">
                    <?php
                    $total = mysqli_num_rows($result) ?: 0;
                    echo "Menampilkan <span class='font-semibold text-slate-600'>$total</span> data mata kuliah";
                    if ($search) echo " untuk pencarian \"<span class='font-semibold text-slate-600'>" . htmlspecialchars($search) . "</span>\"";
                    ?>
                </p>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 text-center py-8 text-sm text-slate-600">
        &copy; <?php echo date('Y'); ?>
        <span class="font-semibold text-blue-600">Sistem Informasi Akademik</span>
        — Modul 11 PHP Database (CRUD)
    </footer>

    <script>
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

        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-label', 'Buka menu');
            }
        });
    </script>

</body>
</html>