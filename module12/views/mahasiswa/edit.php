<?php 
/** @var array $mahasiswa */
$mahasiswa = $mahasiswa ?? ['npm' => '', 'namaMhs' => '', 'prodi' => '', 'alamat' => '', 'noHP' => '']; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIA - Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-gradient-to-br from-emerald-600 to-teal-500 p-8 text-white text-center">
            <h2 class="text-2xl font-extrabold tracking-tight">Ubah Data Mahasiswa</h2>
            <p class="text-emerald-100/80 text-xs mt-1">Perbarui informasi mahasiswa NPM #<?php echo htmlspecialchars($mahasiswa['npm']); ?></p>
        </div>

        <form action="index.php?page=mahasiswa&action=edit&id=<?php echo htmlspecialchars($mahasiswa['npm']); ?>" method="POST" class="p-8 space-y-4">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">NPM (Tidak Dapat Diubah)</label>
                <input type="text" disabled value="<?php echo htmlspecialchars($mahasiswa['npm']); ?>"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm bg-slate-100 font-semibold text-slate-500 cursor-not-allowed">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Nama Lengkap</label>
                <input type="text" name="namaMhs" required value="<?php echo htmlspecialchars($mahasiswa['namaMhs']); ?>"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Program Studi</label>
                <input type="text" name="prodi" required value="<?php echo htmlspecialchars($mahasiswa['prodi']); ?>"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Alamat Rumah</label>
                <input type="text" name="alamat" required value="<?php echo htmlspecialchars($mahasiswa['alamat']); ?>"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Nomor HP</label>
                <input type="text" name="noHP" required value="<?php echo htmlspecialchars($mahasiswa['noHP']); ?>"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:border-emerald-600 transition-colors bg-slate-50/50">
            </div>

            <div class="flex gap-3 pt-3">
                <a href="index.php?page=mahasiswa" 
                   class="w-1/2 text-center px-4 py-3.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="w-1/2 px-4 py-3.5 bg-emerald-600 text-white rounded-xl text-sm font-bold shadow-md shadow-emerald-500/10 hover:bg-emerald-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</body>
</html>