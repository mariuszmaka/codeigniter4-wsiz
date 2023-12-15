<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

    # metoda: get, post
    #            sciezka, kontroler/funkcja

$routes->get('/', 'BookController::index');


$routes->get('catalog',     'BookController::index');
$routes->get('book/(:num)', 'BookController::getBook/$1');
$routes->get('bookPDF/(:num)', 'BookController::getBookPDF/$1');

$routes->get ('login',  'LoginController::index');
$routes->post('login',  'LoginController::do_login');
$routes->get ('logout', 'LoginController::logout');


$routes->get('user',    'UserController::index');
$routes->post('user',   'UserController::update');


$routes->get ('registration',   'RegistrationController::index');
$routes->post('registration',   'RegistrationController::do_register');

$routes->get('search', 'SearchController::index');

$routes->get('recommendation', 'RecommendationController::index');

$routes->post('order', 'OrderController::store');
$routes->get('order', 'OrderController::index');


/* admin */

$routes->get('admin', 'AdminController::index');
$routes->get('admin/users', 'AdminController::users');
$routes->get('admin/orders', 'AdminController::orders');
$routes->get('admin/books', 'AdminController::books');

$routes->get('admin/upload', 'UploadController::upload');
$routes->post('upload/upload', 'UploadController::upload');