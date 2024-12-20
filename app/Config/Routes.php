<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/shop', 'Home::boutique');
$routes->get('/config', 'Home::configurateur');
$routes->get('/faq', 'Home::faq');
$routes->get('/policy-cookies', 'Home::cookies');
$routes->get('/clause', 'Home::clause');
$routes->get('/legal', 'Home::legal');
$routes->get('/inscription', 'Home::inscription');
$routes->get('/login', 'Home::login');
$routes->get('/panier', 'Home::panier');
$routes->get('/confirmation', 'Home::confirm');


/** Components */
$routes->get('compile/scss_to_css', 'CompilerV2::scss_to_css');
$routes->get('test', 'TestController::index');
$routes->get('evenements', 'EventController::index');