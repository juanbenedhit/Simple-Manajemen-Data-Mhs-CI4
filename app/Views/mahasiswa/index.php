<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Mahasiswa</title>
    <!-- Memuat Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menambahkan font Inter untuk tampilan yang lebih modern */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Style untuk transisi modal */
        .modal-backdrop {
            transition: opacity 0.3s ease;
        }
        .modal-content {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Kontainer Utama -->
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">

        <!-- Header -->
        <header class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-700">Manajemen Data Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Daftar semua mahasiswa yang terdaftar di sistem.</p>
        </header>
        
        <!-- Notifikasi Sukses (Contoh) -->
        <div id="success-alert" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>Data mahasiswa berhasil diperbarui.</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="mb-6">
            <a href="/mahasiswa/create" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Data Mahasiswa
            </a>
        </div>

        <!-- Tabel Data Mahasiswa -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIM</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Mahasiswa</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jurusan</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Angkatan</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php if (!empty($mahasiswa) && is_array($mahasiswa)) : ?>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <tr>
                                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?= esc($mhs->nim); ?></td>
                                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?= esc($mhs->nama); ?></td>
                                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?= esc($mhs->jurusan); ?></td>
                                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm"><?= esc($mhs->angkatan); ?></td>
                                        <td class="px-5 py-4 border-b border-gray-200 bg-white text-sm flex items-center space-x-2">
                                            <a href="/mahasiswa/edit/<?= esc($mhs->id); ?>" class="text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-100 transition-colors" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <button onclick="openModal(this)" data-id="<?= esc($mhs->id); ?>" data-name="<?= esc($mhs->nama); ?>" data-nim="<?= esc($mhs->nim); ?>" class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-100 transition-colors" title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center py-10 px-5 text-gray-500">
                                        Belum ada data mahasiswa. Silakan tambahkan data baru.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal-backdrop fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center p-4 hidden opacity-0">
        <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md p-6 transform scale-95">
            <div class="flex items-start">
                <div class="flex-shrink-0 mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-4 text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Konfirmasi Hapus
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Apakah Anda yakin ingin menghapus data mahasiswa ini secara permanen?
                        </p>
                        <div class="mt-2 p-2 bg-gray-50 rounded">
                            <p class="text-sm font-semibold text-gray-700" id="data-name"></p>
                            <p class="text-xs text-gray-500" id="data-nim"></p>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">
                           Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <a href="/mahasiswa/delete/<?= $mhs->id; ?>" type="button"  class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Hapus Permanen
                </a>
                <a type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Batal
                </a>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('deleteModal');
        const modalBackdrop = document.querySelector('.modal-backdrop');
        const modalContent = document.querySelector('.modal-content');
        const dataName = document.getElementById('data-name');
        const dataNim = document.getElementById('data-nim');

        function openModal(button) {
            // Mengambil data dari atribut tombol
            const name = button.getAttribute('data-name');
            const nim = button.getAttribute('data-nim');

            // Menampilkan data di modal
            dataName.textContent = `Nama: ${name}`;
            dataNim.textContent = `NIM: ${nim}`;

            // Menampilkan modal dengan animasi
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            // Menutup modal dengan animasi
            modalBackdrop.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Sesuaikan dengan durasi transisi CSS
        }

        // Menutup modal jika klik di luar area konten
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

</body>
</html>
