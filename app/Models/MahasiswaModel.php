<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key dari tabel mahasiswa

    // Kolom yang boleh diisi/diupdate
    protected $allowedFields = ['npm', 'nama', 'email', 'jurusan', 'semester', 'angkatan'];

    // Fungsi untuk mengambil data mahasiswa berdasarkan NPM
    public function getMahasiswaByNPM($npm)
    {
        return $this->where('npm', $npm)->first();
    }
}
