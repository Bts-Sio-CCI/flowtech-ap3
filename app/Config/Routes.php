<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/shop', 'Boutique::index');


/** Components */
$routes->get('compile/scss_to_css', 'CompilerV2::scss_to_css');
$routes->get('test', 'TestController::index');
$routes->get('evenements', 'EventController::index');