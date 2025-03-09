<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Home
$routes->get('/', 'TaskController::index');

// Create
$routes->get('/create', 'TaskController::create');
$routes->post('/create', 'TaskController::createNewTask');

// Edit
$routes->get('/edit/(:num)', 'TaskController::edit/$1');
$routes->post('/edit/(:num)', 'TaskController::editTask/$1');

// Delete
$routes->get('/delete/(:num)', 'TaskController::delete/$1');

// API
$routes->group('api', function($routes) {
    $routes->get('tasks', 'Api\TaskController::index');
    $routes->get('task/(:num)', 'Api\TaskController::show/$1');
    $routes->post('task', 'Api\TaskController::create');
    $routes->put('task/(:num)', 'Api\TaskController::update/$1');
    $routes->delete('task/(:num)', 'Api\TaskController::delete/$1');
});
