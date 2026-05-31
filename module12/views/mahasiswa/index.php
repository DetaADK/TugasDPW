<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Data Mahasiswa</title>

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

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-slate-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">

            <div class="flex items-center gap-3">
                <div class="bg-gradient-to-tr from-emerald-500 to-emerald-600 p-2.5 rounded-2xl shadow-md shadow-emerald-500/20 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-xl font-black bg-gradient-to-r from-emerald-500 to-emerald-600 bg-clip-text text-transparent tracking-tight">
                        SIA
                    </h1>
                    <p class="text-[10px] font-semibold text-slate-400 tracking-wider uppercase">
                        Sistem Informasi Akademik
                    </p>
                </div>
            </div>

            <ul class="flex items-center gap-1.5 bg-slate-100/80 p-1.5 rounded-2xl border border-slate-200/50">
                <li>
                    <a href="index.php?page=dashboard"
                       class="block px-4 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-white/60 transition-all duration-200">
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
                       class="block bg-white text-emerald-600 px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm border border-slate-200/20 transition-all duration-200">
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

    <main class="max-w-7xl mx-auto px-6 py-12 w-full flex-grow">

        <section class="relative overflow-hidden bg-gradient-to-br from-emerald-500 via-teal-600 to-cyan-700 text-white rounded-[2rem] p-10 md:p-12 mb-10 shadow-xl shadow-emerald-900/10">
            <div class="absolute top-0 right-0 -mt-12 -mr-12 w-72 h-72 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 -mb-16 w-48 h-48 bg-teal-500/20 rounded-full blur-xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight mb-2">Data Mahasiswa</h1>
                    <p class="text-emerald-100/90 font-normal">Kelola registrasi database siswa, administrasi data diri, dan status akademik.</p>
                </div>
                
                <div>
                    <a href="index.php?page=mahasiswa&action=create" 
                       class="inline-flex items-center gap-2 bg-white text-emerald-600 hover:bg-emerald-50 px-5 py-3.5 rounded-2xl text-sm font-bold shadow-md hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 transform">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Mahasiswa Baru
                    </a>
                </div>
            </div>
        </section>

        <div class="bg-white rounded-[2rem] shadow-md border border-slate-100 overflow-hidden">
            <?php if (!empty($data)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/70 border-b border-slate-100 text-slate-400 text-xs font-bold uppercase tracking-wider">
                                <th class="px-8 py-5 w-24">NPM</th>
                                <th class="px-8 py-5">Nama Lengkap Mahasiswa</th>
                                <th class="px-8 py-5 text-center w-48">Aksi Manajemen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                            <?php foreach($data as $mahasiswa): ?>
                            <tr class="hover:bg-emerald-50/20 transition-colors duration-150 group">
                                <td class="px-8 py-4 font-semibold text-slate-500 group-hover:text-emerald-600 transition-colors">
                                    <?php echo $mahasiswa['npm']; ?>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 font-bold text-xs flex items-center justify-center border border-emerald-100 uppercase">
                                            <?php echo substr($mahasiswa['namaMhs'], 0, 2); ?>
                                        </div>
                                        <span class="font-semibold text-slate-800 group-hover:text-slate-900">
                                            <?php echo $mahasiswa['namaMhs']; ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-center">
                                    <div class="inline-flex items-center gap-2 bg-slate-50 p-1 rounded-xl border border-slate-200/60">
                                        <a href="index.php?page=mahasiswa&action=edit&id=<?php echo $mahasiswa['npm']; ?>" 
                                           class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-bold text-emerald-600 hover:bg-white hover:shadow-sm transition-all duration-200">
                                            Edit
                                        </a>
                                        <span class="text-slate-300">|</span>
                                        <button type="button" 
                                                onclick="bukaModalHapusMhs('<?php echo $mahasiswa['npm']; ?>', '<?php echo htmlspecialchars($mahasiswa['namaMhs']); ?>')"
                                                class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-bold text-red-600 hover:bg-white hover:shadow-sm transition-all duration-200">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center py-16 px-4">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-700 mb-1">Tidak Ada Data Mahasiswa</h3>
                    <p class="text-sm text-slate-400 max-w-xs mx-auto">Database kosong atau belum ada mahasiswa yang terregistrasi.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

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

    <div id="modalHapusMhs" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-all duration-300">
        <div class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-transform duration-300">
        
        <div class="bg-gradient-to-br from-emerald-600 to-teal-500 p-8 text-white text-center relative">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border border-white/30 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <h3 class="text-xl font-black tracking-tight">Hapus Data Mahasiswa</h3>
            <p class="text-emerald-100/80 text-xs mt-1">Konfirmasi penghapusan data dari sistem akademik</p>
        </div>

        <div class="p-8 text-center">
            <p class="text-slate-600 text-sm leading-relaxed">
                Apakah Anda yakin ingin menghapus data dari mahasiswa berikut?<br>
                <span id="namaMhsTeks" class="font-bold text-slate-900 text-base block mt-2 bg-slate-50 py-2.5 px-4 rounded-xl border border-slate-100"></span>
            </p>
        </div>

        <div class="px-8 pb-8 flex gap-3">
            <button type="button" onclick="tutupModalHapusMhs()"
                    class="w-1/2 text-center px-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-500 hover:bg-slate-50 transition-colors">
                Batal
            </button>
            <a id="linkHapusMhs" href="#" 
               class="w-1/2 text-center px-4 py-3 bg-red-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-red-500/20 hover:bg-red-700 transition-all duration-200 block">
                Ya, Hapus Data
            </a>
        </div>
    </div>
</div>

<script>
    function bukaModalHapusMhs(npm, namaMhs) {
        document.getElementById('namaMhsTeks').innerText = namaMhs;
        document.getElementById('linkHapusMhs').href = 'index.php?page=mahasiswa&action=delete&id=' + npm;
        document.getElementById('modalHapusMhs').classList.remove('hidden');
    }
    
    function tutupModalHapusMhs() {
        document.getElementById('modalHapusMhs').classList.add('hidden');
    }

    // Menutup modal jika area luar box modal diklik
    window.onclick = function(event) {
        const modal = document.getElementById('modalHapusMhs');
        if (event.target == modal) {
            modal.classList.add('hidden');
        }
    }
</script>
</html>