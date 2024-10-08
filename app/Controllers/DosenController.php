<?php

namespace App\Controllers;

use App\Models\DosenModel;
use CodeIgniter\Controller;

class DosenController extends Controller
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }

    // READ: Menampilkan semua data dosen
    public function index()
    {
        $data['dosen'] = $this->dosenModel->getDosen();
        return view('admin/dosen/index', $data);
    }

    // CREATE: Menampilkan form tambah dosen
    public function create()
    {
        return view('admin/dosen/create');
    }

    // CREATE: Menyimpan data dosen ke database
    public function store()
    {
        $this->dosenModel->save([
            'nidn'     => $this->request->getPost('nidn'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'telepon'  => $this->request->getPost('telepon'),
            'fakultas' => $this->request->getPost('fakultas'),
            'status'   => $this->request->getPost('status'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/dosen');
    }

    // UPDATE: Menampilkan form edit dosen
    public function edit($id)
    {
        $data['dosen'] = $this->dosenModel->getDosen($id);
        return view('dosen_edit', $data);
    }

    // UPDATE: Menyimpan perubahan data dosen
    public function update($id)
    {
        $this->dosenModel->update($id, [
            'nidn'     => $this->request->getPost('nidn'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'telepon'  => $this->request->getPost('telepon'),
            'fakultas' => $this->request->getPost('fakultas'),
            'status'   => $this->request->getPost('status'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/dosen');
    }

    // DELETE: Menghapus data dosen
    public function delete($id)
    {
        $this->dosenModel->delete($id);
        return redirect()->to('/dosen');
    }
}
