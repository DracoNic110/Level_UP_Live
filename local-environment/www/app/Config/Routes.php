<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing page
$routes->get('/', 'LandingController::index');

// Live streams
$routes->get('streams', 'StreamController::index');
$routes->get('streams/(:segment)', 'StreamController::watch/$1');

// Video on demand
$routes->get('vod', 'VodController::index');
$routes->get('vod/(:segment)', 'VodController::watch/$1');
