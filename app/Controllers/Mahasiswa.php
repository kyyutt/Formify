<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
        $data = $mahasiswaModel->findAll(); // Mengambil semua data mahasiswa
        return view('mahasiswa', ['mahasiswa' => $data]);
    }
    
    public function getMahasiswa($npm)
    {
        $mahasiswaModel = new MahasiswaModel();
        $mahasiswa = $mahasiswaModel->getMahasiswaByNPM($npm); // Ambil mahasiswa berdasarkan NPM
        return view('mahasiswa/detail', ['mahasiswa' => $mahasiswa]);
    }
}


?>
