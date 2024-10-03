<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'Home::index');
$routes->get('/admin/students', 'Mahasiswa::index'); 
$routes->get('admin/evaluation/services', 'Evaluation::layanan');

