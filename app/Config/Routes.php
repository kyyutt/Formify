<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'Home::index');

$routes->group('admin', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('students', 'MahasiswaController::index'); // Menampilkan daftar mahasiswa
    $routes->get('students/create', 'MahasiswaController::create'); // Menampilkan form create mahasiswa
    $routes->post('students/store', 'MahasiswaController::store'); // Menyimpan data mahasiswa baru
    $routes->get('students/edit/(:segment)', 'MahasiswaController::edit/$1'); // Menampilkan form edit mahasiswa
    $routes->post('students/update/(:segment)', 'MahasiswaController::update/$1'); // Mengupdate data mahasiswa
    $routes->get('students/delete/(:any)', 'MahasiswaController::delete/$1');
});


$routes->group('dosen', function($routes) {
    $routes->get('/', 'Dosen::index');  // Route untuk menampilkan semua dosen
    $routes->get('create', 'Dosen::create');  // Route untuk form tambah dosen
    $routes->post('store', 'Dosen::store');  // Route untuk menyimpan dosen
    $routes->get('edit/(:segment)', 'Dosen::edit/$1');  // Route untuk form edit dosen
    $routes->post('update/(:segment)', 'Dosen::update/$1');  // Route untuk mengupdate dosen
    $routes->get('delete/(:segment)', 'Dosen::delete/$1');  // Route untuk menghapus dosen
});


$routes->get('admin/evaluation/services', 'Evaluation::layanan');

