<?php

namespace App\Controllers;


use CodeIgniter\Controller;

class Table extends Controller
{
    public function index()
    {
        return view('table-datatable.php');
    }
}
