<?php

namespace App\Controllers;

use App\Models\KuisionerModel; 
use CodeIgniter\Controller;

class Kuis extends Controller
{
    public function index()
    {
        // Instance dari model untuk mendapatkan data
        $kuisionerModel = new KuisionerModel();

        // Mengambil semua data dari model
        $data['kuisioners'] = $kuisionerModel->findAll();

        // Menampilkan view dengan data yang sudah diambil
        return view('kuisioner_view', $data);
    }
}
