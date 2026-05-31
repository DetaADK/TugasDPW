<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Tambah Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden relative">
        
        <div class="relative overflow-hidden bg-gradient-to-br from-violet-600 via-purple-600 to-indigo-800 p-8 text-white text-center">
            <div class="absolute top-0 right-0 -mt-8 -mr-8 w-32 h-32 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-24 h-24 bg-purple-500/20 rounded-full blur-lg pointer-events-none"></div>

            <div class="relative z-10">
                <h2 class="text-2xl font-extrabold tracking-tight">Tambah Mata Kuliah</h2>
                <p class="text-violet-100/80 text-xs mt-1">Masukkan data kurikulum mata kuliah baru</p>
            </div>
        </div>

        <form action="index.php?page=matkul&action=create" method="POST" class="p-8 space-y-5">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama Mata Kuliah</label>
                <input type="text" name="namaMK" required placeholder="Contoh: Pemrograman Web Berbasis Objek"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-500/10 transition-all bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Bobot SKS</label>
                <input type="number" name="sks" min="1" max="6" required placeholder="Contoh: 3"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-violet-600 focus:ring-2 focus:ring-violet-500/10 transition-all bg-slate-50/50">
            </div>

            <div class="flex gap-3 pt-2">
                <a href="index.php?page=matkul" 
                   class="w-1/2 text-center px-4 py-3.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="w-1/2 px-4 py-3.5 bg-gradient-to-r from-violet-600 to-purple-600 text-white rounded-xl text-sm font-bold shadow-md shadow-violet-500/20 hover:from-violet-700 hover:to-purple-700 transition-all transform active:scale-95">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

</body>
</html>