<?php 

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    // View all students (mahasiswa)
    public function index()
    {
        $data['mahasiswa'] = $this->mahasiswaModel->findAll();
        return view('admin/mahasiswa/index', $data);
    }

    // Show form to create a new mahasiswa
    public function create()
    {
        return view('admin/mahasiswa/create');
    }

    // Store new mahasiswa data
    public function store()
    {
        // Check if NPM already exists
        if ($this->mahasiswaModel->find($this->request->getPost('npm'))) {
            return redirect()->back()->with('error', 'NPM already exists');
        }

        // Save new mahasiswa
        $this->mahasiswaModel->save([
            'npm' => $this->request->getPost('npm'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'jurusan' => $this->request->getPost('jurusan'),
            'semester' => $this->request->getPost('semester'),
            'angkatan' => $this->request->getPost('angkatan')
        ]);

        return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa successfully added');
    }

    // Show form to edit existing mahasiswa
    public function edit($npm)
    {
        $data['mahasiswa'] = $this->mahasiswaModel->where('npm', $npm)->first();
        if (!$data['mahasiswa']) {
            return redirect()->to('/admin/mahasiswa')->with('error', 'Mahasiswa not found');
        }

        return view('admin/mahasiswa/edit', $data);
    }

    // Update mahasiswa data
    public function update($npm)
    {
        // Find the mahasiswa first
        $mahasiswa = $this->mahasiswaModel->where('npm', $npm)->first();
        if (!$mahasiswa) {
            return redirect()->to('/admin/mahasiswa')->with('error', 'Mahasiswa not found');
        }

        // Update mahasiswa data
        $this->mahasiswaModel->where('npm', $npm)->set([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'jurusan' => $this->request->getPost('jurusan'),
            'semester' => $this->request->getPost('semester'),
            'angkatan' => $this->request->getPost('angkatan')
        ])->update();

        return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa successfully updated');
    }

    // Delete mahasiswa
    public function delete($npm)
    {
        // Find the mahasiswa first
        $mahasiswa = $this->mahasiswaModel->where('npm', $npm)->first();
        if (!$mahasiswa) {
            return redirect()->to('/admin/mahasiswa')->with('error', 'Mahasiswa not found');
        }

        // Delete mahasiswa
        $this->mahasiswaModel->where('npm', $npm)->delete();
        return redirect()->to('/admin/mahasiswa')->with('success', 'Mahasiswa successfully deleted');
    }
}


?>
