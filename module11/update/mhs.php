<?php
include '../koneksi.php';

// ── Proses UPDATE jika form disubmit ──
if (isset($_POST['edit'])) {
    $npm     = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi   = $_POST['prodi'];
    $alamat  = $_POST['alamat'];
    $noHP    = $_POST['noHP'];

    $query  = "UPDATE tbl_mahasiswa SET namaMhs='$namaMhs', prodi='$prodi', alamat='$alamat', noHP='$noHP' WHERE npm='$npm'";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($link));
    }

    header("location:../view/mhs.php?msg=Data mahasiswa berhasil diperbarui!");
    exit;
}

// ── Ambil data untuk form ──
if (!isset($_GET['npm'])) {
    header("location:../view/mhs.php");
    exit;
}

$npm    = $_GET['npm'];
$query  = "SELECT * FROM tbl_mahasiswa WHERE npm='$npm'";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($link));
}

$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa — SIA</title>
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

        .glass {
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        /* Animasi hamburger → X */
        .bar { transition: transform .3s ease, opacity .3s ease; }
        .open .bar-top    { transform: translateY(8px) rotate(45deg); }
        .open .bar-mid    { opacity: 0; transform: scaleX(0); }
        .open .bar-bottom { transform: translateY(-8px) rotate(-45deg); }

        /* Input focus ring biru */
        .input-field {
            @apply w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm text-slate-700
                   bg-white outline-none transition-all duration-200
                   focus:border-blue-400 focus:ring-2 focus:ring-blue-100;
        }

        .input-field:hover { @apply border-slate-300; }
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
                      class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../view/dosen.php"
                      class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="../view/mahasiswa.php"
                      class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-semibold
                              hover:bg-blue-700 transition-all duration-300 shadow-md shadow-blue-500/20">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="../view/matakuliah.php"
                       class="px-4 py-2 rounded-xl text-sm font-medium text-slate-600
                              hover:bg-blue-50 hover:text-blue-600 transition-all duration-300">
                        Mata Kuliah
                    </a>
                </li>
            </ul>

            <!-- Hamburger — mobile only -->
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
                      class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../view/dosen.php"
                      class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium
                              text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="../view/mahasiswa.php"
                      class="flex items-center gap-3 bg-blue-600 text-white px-4 py-3
                              rounded-xl text-sm font-semibold shadow-md shadow-blue-500/20">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="../view/matakuliah.php"
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

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-sm text-slate-400 mb-6 animate-fade-up anim-d1">
            <a href="../view/mhs.php" class="hover:text-blue-600 transition-colors duration-200">
                Mahasiswa
            </a>
            <span>/</span>
            <span class="text-slate-600 font-medium">Edit Data</span>
        </div>

        <!-- Form Card -->
        <div class="bg-white/95 border border-slate-200 rounded-3xl shadow-lg overflow-hidden
                    animate-fade-up anim-d2">

            <!-- Card Header -->
            <div class="px-8 py-6 border-b border-slate-100"
                style="background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 50%, #4f46e5 100%);">
                <div class="flex items-center gap-3">
                    <div>
                        <h2 class="text-white font-extrabold text-lg leading-none">Edit Data Mahasiswa</h2>
                        <p class="text-blue-100 text-xs mt-1">
                            NPM: <span class="font-semibold"><?php echo htmlspecialchars($data['npm']); ?></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Body -->
            <form action="mhs.php?npm=<?php echo urlencode($data['npm']); ?>" method="post"
                  class="px-8 py-8">

                <input type="hidden" name="npm" value="<?php echo htmlspecialchars($data['npm']); ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Nama Mahasiswa -->
                    <div class="flex flex-col gap-1.5">
                        <label for="namaMhs" class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Nama Mahasiswa
                        </label>
                        <input type="text"
                              name="namaMhs" id="namaMhs"
                              value="<?php echo htmlspecialchars($data['namaMhs']); ?>"
                              class="input-field" required>
                    </div>

                    <!-- Program Studi -->
                    <div class="flex flex-col gap-1.5">
                        <label for="prodi" class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Program Studi
                        </label>
                        <input type="text"
                              name="prodi" id="prodi"
                              value="<?php echo htmlspecialchars($data['prodi']); ?>"
                              class="input-field" required>
                    </div>

                    <!-- Alamat -->
                    <div class="flex flex-col gap-1.5">
                        <label for="alamat" class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            Alamat
                        </label>
                        <input type="text"
                              name="alamat" id="alamat"
                              value="<?php echo htmlspecialchars($data['alamat']); ?>"
                              class="input-field" required>
                    </div>

                    <!-- No HP -->
                    <div class="flex flex-col gap-1.5">
                        <label for="noHP" class="text-xs font-bold uppercase tracking-widest text-slate-400">
                            No HP
                        </label>
                        <input type="tel"
                              name="noHP" id="noHP"
                              value="<?php echo htmlspecialchars($data['noHP']); ?>"
                              class="input-field" required>
                    </div>

                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 mt-8 pt-6 border-t border-slate-100">
                    <button type="submit" name="edit"
                            class="flex items-center gap-2 bg-blue-600 text-white px-6 py-2.5
                                  rounded-xl text-sm font-semibold shadow-md shadow-blue-500/20
                                  hover:bg-blue-700 hover:-translate-y-0.5 transition-all duration-200">
                        Update Data
                    </button>
                    <a href="../view/mhs.php"
                      class="flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-semibold
                              text-slate-600 border border-slate-200
                              hover:bg-slate-50 hover:border-slate-300 transition-all duration-200">
                        Batal
                    </a>
                </div>

            </form>
        </div>

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