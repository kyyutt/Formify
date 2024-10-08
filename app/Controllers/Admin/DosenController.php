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

    // View all dosen
    public function index()
    {
        $data['dosen'] = $this->dosenModel->findAll();
        return view('admin/dosen/index', $data);
    }

    // Show form to create a new dosen
    public function create()
    {
        return view('admin/dosen/create');
    }

    // Store new dosen data
    public function store()
    {
        $this->dosenModel->save([
            'nidn' => $this->request->getPost('nidn'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'fakultas' => $this->request->getPost('fakultas'),
            'status' => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/dosen/index')->with('success', 'Dosen successfully added');
    }

    // Show form to edit existing dosen
    public function edit($nidn)
    {
        $data['dosen'] = $this->dosenModel->where('nidn', $nidn)->first();
        if (!$data['dosen']) {
            return redirect()->to('/admin/dosen/index')->with('error', 'Dosen not found');
        }

        return view('admin/dosen/edit', $data);
    }

    // Update dosen data
    public function update($nidn)
    {
        $this->dosenModel->where('nidn', $nidn)->set([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'fakultas' => $this->request->getPost('fakultas'),
            'status' => $this->request->getPost('status'),
        ])->update();

        return redirect()->to('/admin/dosen/index')->with('success', 'Dosen successfully updated');
    }

    // Delete dosen
    public function delete($nidn)
    {
        $this->dosenModel->where('nidn', $nidn)->delete();
        return redirect()->to('/admin/dosen/index')->with('success', 'Dosen successfully deleted');
    }
}
