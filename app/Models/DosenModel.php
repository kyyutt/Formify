<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table      = 'dosen';
    protected $primaryKey = 'id_dosen';
    
    protected $allowedFields = [
        'nidn', 
        'nama', 
        'email', 
        'telepon', 
        'fakultas', 
        'status', 
        'password'
    ];

}
