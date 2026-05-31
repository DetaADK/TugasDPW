<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-gradient-to-br from-emerald-600 to-teal-500 p-8 text-white text-center">
            <h2 class="text-2xl font-extrabold tracking-tight">Tambah Mahasiswa</h2>
            <p class="text-emerald-100/80 text-xs mt-1">Masukkan data lengkap mahasiswa baru</p>
        </div>

        <form action="index.php?page=mahasiswa&action=create" method="POST" class="p-8 space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">NPM (Nomor Pokok Mahasiswa)</label>
                <input type="text" name="npm" required placeholder="Contoh: 253307051"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Nama Lengkap</label>
                <input type="text" name="namaMhs" required placeholder="Nama Lengkap Mahasiswa"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Program Studi</label>
                <input type="text" name="prodi" required placeholder="Contoh: Teknik Informatika"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Alamat Rumah</label>
                <input type="text" name="alamat" required placeholder="Contoh: Jl. Diponegoro No. 12, Madiun"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Nomor HP</label>
                <input type="text" name="noHP" required placeholder="Contoh: 0857XXXXXXXX"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div class="flex gap-3 pt-3">
                <a href="index.php?page=mahasiswa" 
                   class="w-1/2 text-center px-4 py-3.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="w-1/2 px-4 py-3.5 bg-emerald-600 text-white rounded-xl text-sm font-bold shadow-md shadow-emerald-500/10 hover:bg-emerald-700 transition-colors">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

</body>
</html>