<?php
namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'npm'; // Use npm as the primary key
    protected $allowedFields = ['npm', 'nama', 'email', 'jurusan', 'semester', 'angkatan'];
}

