<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Tambah Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-gradient-to-br from-[#ea580c] to-[#eab308] p-8 text-white text-center relative">
            <h2 class="text-2xl font-extrabold tracking-tight">Tambah Dosen</h2>
            <p class="text-orange-100/80 text-xs mt-1">Masukkan data identitas dosen baru ke dalam sistem</p>
        </div>

        <form action="index.php?page=dosen&action=create" method="POST" class="p-8 space-y-5">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nama Lengkap Dosen</label>
                <input type="text" name="namaDosen" required placeholder="Contoh: Dr. Ir. H. Supriadi, M.T."
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-[#ea580c] transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Nomor HP / WhatsApp</label>
                <input type="text" name="noHP" required placeholder="Contoh: 08123456789"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-[#ea580c] transition-colors bg-slate-50/50">
            </div>

            <div class="flex gap-3 pt-2">
                <a href="index.php?page=dosen" 
                   class="w-1/2 text-center px-4 py-3.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="w-1/2 px-4 py-3.5 bg-[#ea580c] text-white rounded-xl text-sm font-bold shadow-md shadow-orange-500/10 hover:bg-orange-600 transition-colors">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>

</body>
</html>