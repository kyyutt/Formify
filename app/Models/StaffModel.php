<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff'; // Nama tabel di database
    protected $primaryKey = 'nip'; // Primary key tabel

    // Fields yang diperbolehkan untuk diisi melalui insert atau update
    protected $allowedFields = ['nip', 'nama', 'email', 'telepon', 'departemen', 'jabatan', 'password'];

    // Menentukan apakah primary key auto increment atau tidak
    protected $useAutoIncrement = false;

    // Return type data, bisa diubah jadi object jika dibutuhkan
    protected $returnType = 'array';

    // Enable timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validasi untuk field tertentu (opsional)
    protected $validationRules = [
        'nip' => 'required|numeric|is_unique[staff.nip]',
        'nama' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email',
        'telepon' => 'required|numeric',
        'departemen' => 'required',
        'jabatan' => 'required',
    ];

    // Pesan error (opsional)
    protected $validationMessages = [
        'nip' => [
            'required' => 'NIP harus diisi',
            'numeric' => 'NIP harus berupa angka',
            'is_unique' => 'NIP sudah ada'
        ],
        'nama' => [
            'required' => 'Nama harus diisi',
            'min_length' => 'Nama minimal harus 3 karakter',
            'max_length' => 'Nama maksimal 255 karakter'
        ],
        'email' => [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email harus valid'
        ],
        'telepon' => [
            'required' => 'Telepon harus diisi',
            'numeric' => 'Telepon harus berupa angka'
        ],
        'departemen' => [
            'required' => 'Departemen harus diisi'
        ],
        'jabatan' => [
            'required' => 'Jabatan harus diisi'
        ]
    ];

    // Mengabaikan validasi selama insert atau update jika dibutuhkan
    protected $skipValidation = false;
}
