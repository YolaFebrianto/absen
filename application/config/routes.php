<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['(:num)']			 = 'pengguna/index/$1';
$route['pengguna/form-add']	 = 'pengguna/form_add';
$route['pengguna/form-edit'] = 'pengguna/form_edit';
$route['default_controller'] = 'pengguna';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
