<?php

namespace App\Controllers;

use App\Models\StaffModel;
use CodeIgniter\Controller;

class StaffController extends Controller
{
    protected $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
    }

    // View all staff
    public function index()
    {
        $data['staff'] = $this->staffModel->findAll();
        return view('admin/staff/index', $data);
    }

    // Show form to create a new staff
    public function create()
    {
        return view('admin/staff/create');
    }

    // Store new staff data
    public function store()
    {
        // Check if NIP already exists
        if ($this->staffModel->find($this->request->getPost('nip'))) {
            return redirect()->back()->with('error', 'NIP already exists');
        }

        // Save new staff
        $this->staffModel->save([
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'departemen' => $this->request->getPost('departemen'),
            'jabatan' => $this->request->getPost('jabatan'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/staff')->with('success', 'Staff successfully added');
    }

    // Show form to edit existing staff
    public function edit($nip)
    {
        $data['staff'] = $this->staffModel->where('nip', $nip)->first();
        if (!$data['staff']) {
            return redirect()->to('/admin/staff')->with('error', 'Staff not found');
        }

        return view('admin/staff/edit', $data);
    }

    // Update staff data
    public function update($nip)
    {
        // Find the staff first
        $staff = $this->staffModel->where('nip', $nip)->first();
        if (!$staff) {
            return redirect()->to('/admin/staff')->with('error', 'Staff not found');
        }

        // Update staff data
        $this->staffModel->where('nip', $nip)->set([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'departemen' => $this->request->getPost('departemen'),
            'jabatan' => $this->request->getPost('jabatan'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ])->update();

        return redirect()->to('/admin/staff')->with('success', 'Staff successfully updated');
    }

    // Delete staff
    public function delete($nip)
    {
        // Find the staff first
        $staff = $this->staffModel->where('nip', $nip)->first();
        if (!$staff) {
            return redirect()->to('/admin/staff')->with('error', 'Staff not found');
        }

        // Delete staff
        $this->staffModel->where('nip', $nip)->delete();
        return redirect()->to('/admin/staff')->with('success', 'Staff successfully deleted');
    }
}
