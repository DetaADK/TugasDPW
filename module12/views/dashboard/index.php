<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik - SIA</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .bg-pattern {
            background-image: radial-gradient(#e2e8f0 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }
    </style>
</head>

<body class="bg-slate-50 bg-pattern min-h-screen flex flex-col justify-between antialiased">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

            <!-- Logo dengan Icon Academic -->
            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-tr from-blue-600 to-indigo-600 p-2.5 rounded-2xl shadow-md shadow-blue-500/20 text-white">
                    <!-- Icon: Academic Cap -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent tracking-tight">
                        SIA
                    </h1>
                    <p class="text-[10px] font-semibold text-slate-400 tracking-wider uppercase">
                            Sistem Informasi Akademik
                    </p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <ul class="flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-2xl border border-slate-200/50">
                <li>
                    <a href="index.php?page=dashboard"
                       class="block bg-white text-blue-600 px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm border border-slate-200/20 transition-all duration-200">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="index.php?page=dosen"
                       class="block px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-white/60 transition-all duration-200">
                        Dosen
                    </a>
                </li>
                <li>
                    <a href="index.php?page=mahasiswa"
                       class="block px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-white/60 transition-all duration-200">
                        Mahasiswa
                    </a>
                </li>
                <li>
                    <a href="index.php?page=matkul"
                       class="block px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-white/60 transition-all duration-200">
                        Mata Kuliah
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-12 w-full flex-grow animate-fade-in">

        <!-- Hero/Header Section dengan Gradient Elegan & Decorative Circles -->
        <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-indigo-600 to-violet-700 text-white rounded-[2rem] p-10 md:p-14 mb-12 shadow-xl shadow-blue-900/10">
            
            <!-- Ornamen Dekoratif Absstrak -->
            <div class="absolute top-0 right-0 -mt-12 -mr-12 w-72 h-72 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 -mb-16 w-48 h-48 bg-indigo-500/20 rounded-full blur-xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl">
                <span class="inline-flex items-center gap-1.5 bg-white/15 border border-white/10 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold tracking-wider uppercase text-blue-100 mb-6">
                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
                    Tahun Akademik <?php echo date('Y'); ?>/<?php echo date('Y') + 1; ?>
                </span>

                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mt-2 mb-4 leading-tight">
                    Dashboard Akademik
                </h1>

                <p class="text-blue-100/90 text-base md:text-lg leading-relaxed font-normal max-w-2xl">
                    Selamat datang di panel kendali utama. Kelola arsitektur data dosen, mahasiswa, dan mata kuliah Anda secara efisien menggunakan keunggulan arsitektur sistem <span class="text-white font-semibold underline decoration-indigo-400 decoration-2 underline-offset-4">OOP MVC</span>.
                </p>
            </div>
        </section>

        <!-- Statistics Cards Grid -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card: Total Dosen (Accent Blue) -->
            <div class="group relative bg-white rounded-[2rem] p-8 shadow-md hover:shadow-xl border border-slate-100 hover:border-blue-200 transform hover:-translate-y-1.5 transition-all duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">
                            Total Dosen
                        </p>
                        <h2 class="text-5xl font-black text-slate-800 tracking-tight group-hover:text-blue-600 transition-colors duration-200">
                            <?php echo isset($countDosen) ? $countDosen : 0; ?>
                        </h2>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100/80 text-blue-600 p-4 rounded-2xl group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white shadow-inner transition-all duration-300">
                        <!-- Icon: Identification -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 014 0m-3 8a3 3 0 100-6 3 3 0 000 6zm5 6v-1a3 3 0 00-3-3H9a3 3 0 00-3 3v1" />
                        </svg>
                    </div>
                </div>
                <!-- Mini Indicator -->
                <div class="pt-4 border-t border-slate-50 flex items-center text-xs text-slate-500 font-medium">
                    <span class="text-blue-600 font-bold mr-1">Pengajar aktif</span> di program studi
                </div>
            </div>

            <!-- Card: Total Mahasiswa (Accent Emerald) -->
            <div class="group relative bg-white rounded-[2rem] p-8 shadow-md hover:shadow-xl border border-slate-100 hover:border-emerald-200 transform hover:-translate-y-1.5 transition-all duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">
                            Total Mahasiswa
                        </p>
                        <h2 class="text-5xl font-black text-slate-800 tracking-tight group-hover:text-emerald-600 transition-colors duration-200">
                            <?php echo isset($countMhs) ? $countMhs : 0; ?>
                        </h2>
                    </div>
                    <div class="bg-gradient-to-br from-emerald-50 to-emerald-100/80 text-emerald-600 p-4 rounded-2xl group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white shadow-inner transition-all duration-300">
                        <!-- Icon: User Group -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <!-- Mini Indicator -->
                <div class="pt-4 border-t border-slate-50 flex items-center text-xs text-slate-500 font-medium">
                    <span class="text-emerald-600 font-bold mr-1">Terdaftar resmi</span> semester ini
                </div>
            </div>

            <!-- Card: Total Mata Kuliah (Accent Violet) -->
            <div class="group relative bg-white rounded-[2rem] p-8 shadow-md hover:shadow-xl border border-slate-100 hover:border-violet-200 transform hover:-translate-y-1.5 transition-all duration-300">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-slate-400 text-xs font-bold uppercase tracking-wider mb-1">
                            Total Mata Kuliah
                        </p>
                        <h2 class="text-5xl font-black text-slate-800 tracking-tight group-hover:text-violet-600 transition-colors duration-200">
                            <?php echo isset($countMK) ? $countMK : 0; ?>
                        </h2>
                    </div>
                    <div class="bg-gradient-to-br from-violet-50 to-violet-100/80 text-violet-600 p-4 rounded-2xl group-hover:scale-110 group-hover:bg-violet-600 group-hover:text-white shadow-inner transition-all duration-300">
                        <!-- Icon: Book Open -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <!-- Mini Indicator -->
                <div class="pt-4 border-t border-slate-50 flex items-center text-xs text-slate-500 font-medium">
                    <span class="text-violet-600 font-bold mr-1">Kurikulum aktif</span> berbobot SKS
                </div>
            </div>

        </section>

    </main>

    <!-- Footer -->
    <footer class="w-full bg-white border-t border-slate-100 mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row items-center justify-between text-sm text-slate-500 gap-4">
            <div>
                &copy; <?php echo date('Y'); ?> <span class="font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">SIA</span>. All rights reserved.
            </div>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 bg-slate-50 px-3 py-1.5 rounded-xl border border-slate-200/40">
                <span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
                Arsitektur OOP MVC Sistem
            </div>
        </div>
    </footer>

</body>
</html>