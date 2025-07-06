<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menambahkan font Inter untuk tampilan yang lebih modern */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Kontainer Utama -->
    <div class="container mx-auto p-4 sm:p-6 lg:p-8 max-w-3xl">

        <!-- Header -->
        <header class="mb-6">
            <a href="/mahasiswa" class="inline-flex items-center text-blue-500 hover:text-blue-700 font-semibold mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar
            </a>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-700">Edit Data Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Isi formulir di bawah ini untuk mengedit data mahasiswa.</p>
        </header>
        
        <!-- Tampilkan notifikasi error validasi -->
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
                <p class="font-bold">Gagal Menyimpan Data!</p>
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li>- <?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <!-- Formulir -->
        <div class="bg-white shadow-md rounded-lg p-6 sm:p-8">
            <form action="/mahasiswa/update/<?= esc($mahasiswa->id); ?>" method="POST">
                <div class="space-y-6">
                    <!-- Input NIM -->
                    <div>
                        <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                        <input type="text" name="nim" id="nim" value="<?= esc($mahasiswa->nim); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Input Nama Lengkap -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" value="<?= esc($mahasiswa->nama); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <!-- Input Jurusan -->
                    <div>
                        <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
                        <select id="jurusan" name="jurusan" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                            <option>Pilih Jurusan</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                            <option>Desain Grafis</option>
                            <option>Manajemen</option>
                        </select>
                    </div>

                    <!-- Input Angkatan -->
                    <div>
                        <label for="angkatan" class="block text-sm font-medium text-gray-700">Angkatan</label>
                        <input type="number" name="angkatan" id="angkatan" value="<?= esc($mahasiswa->angkatan); ?>" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Tombol Aksi Form -->
                <div class="mt-8 pt-5 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="/mahasiswa" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
