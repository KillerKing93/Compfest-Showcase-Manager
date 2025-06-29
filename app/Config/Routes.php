<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Projects::index');
$routes->get('projects', 'Projects::index');
$routes->get('projects/create', 'Projects::create');
$routes->post('projects/create', 'Projects::create');
$routes->post('projects/delete/(:num)', 'Projects::delete/$1');

$routes->get('compfest-17-sea', function() {
    return view('projects/iframe_sea');
});

// Auth routes
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');

// Admin routes (protected)
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/projects', 'Admin::projects');
$routes->get('admin/projects/create', 'Admin::create');
$routes->post('admin/projects/create', 'Admin::create');
$routes->get('admin/projects/edit/(:num)', 'Admin::edit/$1');
$routes->post('admin/projects/edit/(:num)', 'Admin::edit/$1');
$routes->get('admin/projects/delete/(:num)', 'Admin::delete/$1');
