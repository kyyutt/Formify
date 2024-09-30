<?php

namespace App\Models;

use CodeIgniter\Model;

class KuisionerModel extends Model
{
    protected $table = 'kuisioner'; // Nama tabel di database
    protected $primaryKey = 'id';   // Primary key dari tabel
    protected $allowedFields = ['field1', 'field2', 'field3']; // Kolom-kolom yang boleh diisi
}
