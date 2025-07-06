<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="text-gray-800 bg-gray-100">

    <div class="container max-w-3xl p-4 mx-auto sm:p-6 lg:p-8">

        <header class="mb-6">
            <a href="/mahasiswa" class="inline-flex items-center mb-4 font-semibold text-blue-500 hover:text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-2xl font-bold text-gray-700 sm:text-3xl">Edit Data Mahasiswa</h1>
            <p class="mt-1 text-gray-500">Isi formulir di bawah ini untuk mengedit data mahasiswa.</p>
        </header>
        
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="p-4 mb-6 text-red-700 bg-red-100 border-l-4 border-red-500 rounded-md shadow-sm" role="alert">
                <p class="font-bold">Gagal Menyimpan Data!</p>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li>- <?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <div class="p-6 bg-white rounded-lg shadow-md sm:p-8">
            <form action="/mahasiswa/update/<?= esc($mahasiswa->id); ?>" method="POST">
                <div class="space-y-6">
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" id="nim" value="<?= esc($mahasiswa->nim); ?>" class="block w-full px-3 py-2 mt-1 placeholder-gray-400 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" value="<?= esc($mahasiswa->nama); ?>" class="block w-full px-3 py-2 mt-1 placeholder-gray-400 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select id="jurusan" name="jurusan" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option>Pilih Jurusan</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                            <option>Desain Grafis</option>
                            <option>Manajemen</option>
                        </select>
                    </div>

                    <div>
                        <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan" value="<?= esc($mahasiswa->angkatan); ?>" class="block w-full px-3 py-2 mt-1 placeholder-gray-400 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div class="flex justify-end pt-5 mt-8 space-x-3 border-t border-gray-200">
                    <a href="/mahasiswa" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
