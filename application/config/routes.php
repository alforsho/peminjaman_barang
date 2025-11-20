<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|---------------------------------------------------------
| Default Controller
|---------------------------------------------------------
*/
$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth/index';
$route['login/proses'] = 'Auth/login'; 
$route['logout'] = 'Auth/logout';

$route['dashboard/peminjam'] = 'Dashboard/peminjam';
$route['dashboard/pengawas'] = 'Dashboard/pengawas';


/*
|---------------------------------------------------------
| Barang (CRUD) — Pengawas
|---------------------------------------------------------
*/
$route['barang']                 = 'barang/index';
$route['barang/tambah']          = 'barang/tambah';
$route['barang/simpan']          = 'barang/simpan';
$route['barang/edit/(:num)']     = 'barang/edit/$1';
$route['barang/update']          = 'barang/update';
$route['barang/hapus/(:num)']    = 'barang/hapus/$1';

/*
|---------------------------------------------------------
| Peminjaman (Peminjam)
|---------------------------------------------------------
*/
$route['peminjaman']             = 'peminjaman/index';
$route['peminjaman/ajukan']      = 'peminjaman/ajukan';
$route['peminjaman/simpan']      = 'peminjaman/simpan';

/*
|---------------------------------------------------------
| Pengawas Approve / Tolak
|---------------------------------------------------------
*/
$route['peminjaman/approve/(:num)'] = 'peminjaman/approve/$1';
$route['peminjaman/tolak/(:num)']   = 'peminjaman/tolak/$1';
