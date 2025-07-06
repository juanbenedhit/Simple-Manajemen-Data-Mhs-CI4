<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        helper('form');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();

        $data['title'] = 'Daftar Mahasiswa';

        return view('mahasiswa/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Mahasiswa';
        return view('mahasiswa/create', $data);
    }

    public function store()
    {
        $rules = [
            'nim' => 'required|is_unique[mahasiswa.nim]|max_length[15]',
            'nama' => 'required|max_length[100]',
            'jurusan' => 'required',
            'angkatan' => 'required|integer|exact_length[4]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->find($id);
        $data['title'] = 'Edit Data Mahasiswa';

        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mahasiswa tidak ditemukan untuk ID: ' . $id);
        }

        return view('mahasiswa/edit', $data);
    }

    /**
     * @param int $id
     */
    public function update($id)
    {
        $oldData = $this->mahasiswaModel->find($id);
        
        $nimRule = ($oldData->nim == $this->request->getPost('nim')) ? 'required|max_length[15]' : 'required|is_unique[mahasiswa.nim]|max_length[15]';

        $rules = [
            'nim' => $nimRule,
            'nama' => 'required|max_length[100]',
            'jurusan' => 'required',
            'angkatan' => 'required|integer|exact_length[4]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->update($id, [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

}
