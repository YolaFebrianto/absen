<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// /(:num)/(:num)
// /$1/$2
// API ROUTES
$route['api/login/(:any)/(:any)']['GET'] 	= 'ApiController/login/$1/$2';
$route['api/pegawai']['GET'] 				= 'ApiController/getPegawai';
$route['api/pegawai/(:any)']['GET'] 		= 'ApiController/detailPegawai/$1';
$route['api/pegawai']['POST'] 				= 'ApiController/savePegawai';
$route['api/pegawai/(:any)']['PUT'] 		= 'ApiController/updatePegawai/$1';
$route['api/pegawai/(:any)']['DELETE'] 		= 'ApiController/deletePegawai/$1';
$route['api/absensi']['POST'] 				= 'ApiController/saveAbsensi';
$route['api/proform']['GET'] 				= 'ApiController/getProform';
$route['api/proform/(:any)']['GET'] 		= 'ApiController/detailProform/$1';
$route['api/proform']['POST'] 				= 'ApiController/saveProform';
$route['api/proform/(:any)']['PUT'] 		= 'ApiController/updateProform/$1';
$route['api/proform/(:any)']['DELETE'] 		= 'ApiController/deleteProform/$1';

// WEB ROUTES
$route['pengguna']	 			= 'PenggunaController/index';
$route['pengguna/(:any)']		= 'PenggunaController/$1';
$route['pegawai']				= 'PegawaiController/index';
$route['pegawai/(:any)']		= 'PegawaiController/$1';
$route['pegawai/(:any)/(:num)']	= 'PegawaiController/$1/$2';
$route['proform']				= 'ProformController/index';
$route['proform/(:any)']		= 'ProformController/$1';
$route['proform/(:any)/(:num)']	= 'ProformController/$1/$2';
$route['absensi/(:any)']		= 'AbsensiController/$1';
// $route['pengguna/form-add']	 = 'PenggunaController/form_add';
// $route['pengguna/form-edit'] = 'PenggunaController/form_edit';

$route['default_controller'] = 'PenggunaController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
