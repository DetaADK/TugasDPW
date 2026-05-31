<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Data Dosen</title>

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
                <div class="bg-gradient-to-tr from-orange-500 to-orange-600 p-2.5 rounded-2xl shadow-md shadow-orange-500/20 text-white">
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
                    <h1 class="text-xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent tracking-tight">
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
                       class="block bg-white text-[#ea580c] px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm border border-slate-200/20 transition-all duration-200">
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

    <main class="max-w-7xl mx-auto px-6 py-12 w-full flex-grow">

        <section class="relative overflow-hidden bg-gradient-to-br from-[#ea580c] via-[#f97316] to-[#eab308] text-white rounded-[2rem] p-10 md:p-12 mb-10 shadow-xl shadow-orange-900/10">
            <div class="absolute top-0 right-0 -mt-12 -mr-12 w-72 h-72 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute bottom-0 right-1/4 -mb-16 w-48 h-48 bg-white/15 rounded-full blur-xl pointer-events-none"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-extrabold tracking-tight mb-2">Data Dosen</h1>
                    <p class="text-orange-50/90 font-normal">Kelola manajemen data dosen, hak akses, beserta parameter identitas akademik.</p>
                </div>
                
                <div>
                    <a href="index.php?page=dosen&action=create" 
                       class="inline-flex items-center gap-2 bg-white text-[#ea580c] hover:bg-orange-50 px-5 py-3.5 rounded-2xl text-sm font-bold shadow-md hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 transform">
                        <svg xmlns="http://www.w3.org/2000/xl" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Dosen Baru
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
                                <th class="px-8 py-5 w-24">ID</th>
                                <th class="px-8 py-5">Nama Lengkap Dosen</th>
                                <th class="px-8 py-5 text-center w-48">Aksi Manajemen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                            <?php foreach($data as $dosen): ?>
                            <tr class="hover:bg-[#ea580c]/5 transition-colors duration-150 group">
                                
                                <td class="px-8 py-4 font-semibold text-slate-500 group-hover:text-[#ea580c] transition-colors">
                                    <?php echo $dosen['idDosen']; ?>
                                </td>
                                
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-[#ea580c]/10 text-[#ea580c] font-bold text-xs flex items-center justify-center border border-[#ea580c]/20 uppercase">
                                            <?php echo substr($dosen['namaDosen'], 0, 2); ?>
                                        </div>
                                        <span class="font-semibold text-slate-800 group-hover:text-slate-900">
                                            <?php echo $dosen['namaDosen']; ?>
                                        </span>
                                    </div>
                                </td>
                                
                                <td class="px-8 py-4 text-center">
                                    <div class="inline-flex items-center gap-2 bg-slate-50 p-1 rounded-xl border border-slate-200/60">
                                        <a href="index.php?page=dosen&action=edit&id=<?php echo $dosen['idDosen']; ?>" 
                                           class="inline-flex items-center justify-center px-3 py-1.5 rounded-lg text-xs font-bold text-[#B45309] hover:bg-white hover:shadow-sm transition-all duration-200">
                                            Edit
                                        </a>
                                        <span class="text-slate-300">|</span>
                                        <button type="button" 
                                                onclick="bukaModalHapus('<?php echo $dosen['idDosen']; ?>', '<?php echo htmlspecialchars($dosen['namaDosen']); ?>')"
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
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 014 0m-3 8a3 3 0 100-6 3 3 0 000 6zm5 6v-1a3 3 0 00-3-3H9a3 3 0 00-3 3v1" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-700 mb-1">Tidak Ada Data Dosen</h3>
                    <p class="text-sm text-slate-400 max-w-xs mx-auto">Database kosong atau data dosen belum ditambahkan ke sistem.</p>
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
                <span class="w-2 h-2 bg-[#ea580c] rounded-full"></span>
                Arsitektur OOP MVC Sistem
            </div>
        </div>
    </footer>
<div id="modalHapusDosen" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/40 backdrop-blur-sm transition-all duration-300">
    
    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden transform scale-95 transition-transform duration-300">
        
        <div class="bg-gradient-to-br from-red-500 via-[#ea580c] to-[#eab308] p-8 text-white text-center relative">
            <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3 border border-white/30 shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-black tracking-tight">Konfirmasi Hapus</h3>
            <p class="text-orange-50/80 text-xs mt-1">Tindakan ini tidak dapat dibatalkan</p>
        </div>

        <div class="p-8 text-center">
            <p class="text-slate-600 text-sm leading-relaxed">
                Apakah Anda yakin ingin menghapus data dosen <br>
                <span id="namaDosenTeks" class="font-bold text-slate-900 text-base block mt-2 bg-slate-50 py-2 px-4 rounded-xl border border-slate-100"></span>
            </p>
        </div>

        <div class="px-8 pb-8 flex gap-3">
            <button type="button" onclick="tutupModalHapus()"
                    class="w-1/2 text-center px-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-500 hover:bg-slate-50 transition-colors">
                Batal
            </button>
            <a id="linkEksekusiHapus" href="#" 
               class="w-1/2 text-center px-4 py-3 bg-red-600 text-white rounded-xl text-sm font-bold shadow-lg shadow-red-500/20 hover:bg-red-700 transition-all duration-200 block">
                Ya, Hapus Data
            </a>
        </div>
    </div>
</div>
<script>
    function bukaModalHapus(idDosen, namaDosen) {
        // 1. Masukkan nama dosen secara dinamis ke dalam teks modal
        document.getElementById('namaDosenTeks').innerText = namaDosen;
        
        // 2. Setel href tujuan link hapus ke controller sesuai ID dosen yang dipilih
        document.getElementById('linkEksekusiHapus').href = 'index.php?page=dosen&action=delete&id=' + idDosen;
        
        // 3. Munculkan modal dengan menghapus class 'hidden'
        const modal = document.getElementById('modalHapusDosen');
        modal.classList.remove('hidden');
    }

    function tutupModalHapus() {
        // Sembunyikan kembali modal dengan menambahkan class 'hidden'
        const modal = document.getElementById('modalHapusDosen');
        modal.classList.add('hidden');
    }

    // Opsional: Menutup modal jika pengguna tidak sengaja mengeklik area luar box modal
    window.onclick = function(event) {
        const modal = document.getElementById('modalHapusDosen');
        if (event.target == modal) {
            modal.classList.add('hidden');
        }
    }
</script>
</body>
</html>