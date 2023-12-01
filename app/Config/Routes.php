<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->setAutoRoute(true);

$routes->get('catalog', 'Book::index');

$routes->get('login', 'Login::index');
$routes->get('logout', 'Login::logout');
$routes->get('registration', 'Registration::index');

$routes->post('login','Login::do_login');
$routes->post('registration','Registration::do_register');