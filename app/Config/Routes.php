<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/(:num)', 'Barang::detail/$1');

$routes->get('/customer', 'Customer::index');

$routes->get('/transaksi', 'Transaksi::index');
$routes->get('transaksi/input', 'TransaksiController::input');
$routes->post('transaksi/save', 'Transaksi::save');