<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  login dan logout
$routes->get('/', 'User::login');

$routes->get('/login', 'User::login');
$routes->post('/login', 'User::login');

$routes->get('/logout', 'User::logout');

// dashboard
$routes->get('/dashboard-admin', 'User::dashboardAdmin', ['filter' => 'otentifikasi']);
$routes->get('/dashboard', 'User::dashboard');
$routes->get('/dashboard-admin', 'User::dashboardAdmin');

// user
$routes->get('/data-user', 'User::dataUser');
$routes->get('/registrasi', 'User::tambahUser');
$routes->get('/edit-user/(:num)', 'User::editUser/$1');
$routes->post('simpan-user', 'User::simpanUser');
$routes->delete('/user/(:num)', 'User::delete/$1');

$routes->get('/registrasi', 'User::registrasi');
$routes->post('/registrasi', 'User::registrasi');

$routes->get('/profile', 'User::profile');

// kategori
$routes->get('/data-kategori', 'Kategori::dataKategori');
$routes->get('/tambah-kategori', 'Kategori::tambahKategori');
$routes->post('/simpan-kategori', 'Kategori::simpanKategori');
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1');
$routes->post('/update-kategori/(:num)', 'Kategori::simpanEdit/$1');
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

// satuan
$routes->get('/data-satuan', 'Satuan::dataSatuan');
$routes->get('/tambah-satuan', 'Satuan::tambahSatuan');
$routes->post('/simpan-satuan', 'Satuan::simpanSatuan');
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1');
$routes->post('/update-satuan/(:num)', 'Satuan::simpanEdit/$1');
$routes->delete('/satuan/(:num)', 'Satuan::delete/$1');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

// produk
$routes->get('/data-produk', 'Produk::dataProduk');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post('/update-produk/(:num)', 'Produk::simpanEdit/$1');
$routes->delete('/hapus-produk/(:num)', 'Produk::delete/$1');

// penjualan
$routes->get('/data-penjualan', 'Penjualan::dataPenjualan');
$routes->get('/tambah-produk', 'Produk::tambahProduk');
$routes->post('/simpan-produk', 'Produk::simpanProduk');
$routes->get('/transaksi-penjualan','Penjualan::index');
$routes->post('/transaksi-penjualan','Penjualan::simpanPenjualan');
$routes->get('/pembayaran','Penjualan::simpanPembayaran');

// laporan
$routes->get('/laporan', 'Laporan::dataLaporan');
$routes->get('/pdf/generate', 'PdfController::generate');
$routes->get('/pdf/generate/(:num)', 'PdfController::generate$1');

$routes->get('/laporanPenjualan', 'Laporan::dataPenjualan');
$routes->get('/pdf/generate-penjualan', 'PdfController::generatePenjualan');
$routes->get('/pdf/generate-penjualan/(:num)', 'PdfController::generatePenjualan$1');
