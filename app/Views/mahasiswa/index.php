<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .modal-backdrop {
            transition: opacity 0.3s ease;
        }
        .modal-content {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="text-gray-800 bg-gray-100">

    <div class="container p-4 mx-auto sm:p-6 lg:p-8">

        <header class="p-6 mb-6 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold text-gray-700 sm:text-3xl">Manajemen Data Mahasiswa</h1>
            <p class="mt-1 text-gray-500">Daftar semua mahasiswa yang terdaftar di sistem.</p>
        </header>
        
        <div id="success-alert" class="hidden p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500 rounded-md shadow-sm" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>Data mahasiswa berhasil diperbarui.</p>
        </div>

        <div class="mb-6">
            <a href="/mahasiswa/create" class="inline-flex items-center px-4 py-2 font-bold text-white transition-transform transform bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Data Mahasiswa
            </a>
        </div>

        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200">NIM</th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200">Nama Mahasiswa</th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200">Jurusan</th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200">Angkatan</th>
                            <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase border-b-2 border-gray-200">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php if (!empty($mahasiswa) && is_array($mahasiswa)) : ?>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <tr>
                                        <td class="px-5 py-4 text-sm bg-white border-b border-gray-200"><?= esc($mhs->nim); ?></td>
                                        <td class="px-5 py-4 text-sm bg-white border-b border-gray-200"><?= esc($mhs->nama); ?></td>
                                        <td class="px-5 py-4 text-sm bg-white border-b border-gray-200"><?= esc($mhs->jurusan); ?></td>
                                        <td class="px-5 py-4 text-sm bg-white border-b border-gray-200"><?= esc($mhs->angkatan); ?></td>
                                        <td class="flex items-center px-5 py-4 space-x-2 text-sm bg-white border-b border-gray-200">
                                            <a href="/mahasiswa/edit/<?= esc($mhs->id); ?>" class="p-2 text-yellow-600 transition-colors rounded-full hover:text-yellow-900 hover:bg-yellow-100" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <button onclick="openModal(this)" data-id="<?= esc($mhs->id); ?>" data-name="<?= esc($mhs->nama); ?>" data-nim="<?= esc($mhs->nim); ?>" class="p-2 text-red-600 transition-colors rounded-full hover:text-red-900 hover:bg-red-100" title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="px-5 py-10 text-center text-gray-500">
                                        Belum ada data mahasiswa. Silakan tambahkan data baru.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                </table>
            </div>
        </div>

    </div>

    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center hidden p-4 bg-gray-900 bg-opacity-50 opacity-0 modal-backdrop">
        <div class="w-full max-w-md p-6 transform scale-95 bg-white rounded-lg shadow-xl modal-content">
            <div class="flex items-start">
                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="w-6 h-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-4 text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                        Konfirmasi Hapus
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Apakah Anda yakin ingin menghapus data mahasiswa ini secara permanen?
                        </p>
                        <div class="p-2 mt-2 rounded bg-gray-50">
                            <p class="text-sm font-semibold text-gray-700" id="data-name"></p>
                            <p class="text-xs text-gray-500" id="data-nim"></p>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">
                           Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <a href="/mahasiswa/delete/<?= $mhs->id; ?>" type="button"  class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Hapus Permanen
                </a>
                <a type="button" onclick="closeModal()" class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
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
            const name = button.getAttribute('data-name');
            const nim = button.getAttribute('data-nim');

            dataName.textContent = `Nama: ${name}`;
            dataNim.textContent = `NIM: ${nim}`;

            modal.classList.remove('hidden');
            setTimeout(() => {
                modalBackdrop.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95');
            }, 10);
        }

        function closeModal() {
            modalBackdrop.classList.add('opacity-0');
            modalContent.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

</body>
</html>