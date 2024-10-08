<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'Home::index');

$routes->group('admin', ['namespace' => 'App\Controllers'], function($routes) {
    // Routes for students
    $routes->group('students', function($routes) {
        $routes->get('/', 'MahasiswaController::index'); // Menampilkan daftar mahasiswa
        $routes->get('create', 'MahasiswaController::create'); // Menampilkan form create mahasiswa
        $routes->post('store', 'MahasiswaController::store'); // Menyimpan data mahasiswa baru
        $routes->get('edit/(:segment)', 'MahasiswaController::edit/$1'); // Menampilkan form edit mahasiswa
        $routes->post('update/(:segment)', 'MahasiswaController::update/$1'); // Mengupdate data mahasiswa
        $routes->get('delete/(:any)', 'MahasiswaController::delete/$1'); // Menghapus mahasiswa
    });

    // Routes for lecturers
    $routes->group('lecturers', function($routes) {
        $routes->get('/', 'DosenController::index'); // Menampilkan daftar dosen
        $routes->get('create', 'DosenController::create'); // Menampilkan form create dosen
        $routes->post('store', 'DosenController::store'); // Menyimpan data dosen baru
        $routes->get('edit/(:segment)', 'DosenController::edit/$1'); // Menampilkan form edit dosen
        $routes->post('update/(:segment)', 'DosenController::update/$1'); // Mengupdate data dosen
        $routes->get('delete/(:any)', 'DosenController::delete/$1'); // Menghapus dosen
    });

    // Routes for staff
    $routes->group('staff', function($routes) {
        $routes->get('/', 'StaffController::index'); // Menampilkan daftar staff
        $routes->get('create', 'StaffController::create'); // Menampilkan form create staff
        $routes->post('store', 'StaffController::store'); // Menyimpan data staff baru
        $routes->get('edit/(:segment)', 'StaffController::edit/$1'); // Menampilkan form edit staff
        $routes->post('update/(:segment)', 'StaffController::update/$1'); // Mengupdate data staff
        $routes->get('delete/(:any)', 'StaffController::delete/$1'); // Menghapus staff
    });
});




