<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Pages
$route['page']          = 'pages/view';
$route['page/(:any)']   = 'pages/view/$1';

//login register forgot password
$route['register']          = 'login/register';
$route['forgot_password']   = 'login/forgot_password';
$route['aktivasi/(:any)']   = 'login/aktivasi/$1';
$route['forgot.do']         = 'login/proses_forgot_password';
$route['reset/(:any)']      = 'login/reset_password/$1';
$route['reset.do']          = 'login/proses_reset_password';


$route['profile.php']       = 'master/user/profile';
$route['ubah_password.php'] = 'master/user/ubah_password';
$route['login.php']        	= 'login';
$route['logout.php']        = 'login/logout';

//Master
$route['master/user_pelaksana'] = 'master/user/user_pelaksana';


$route['aktivitas/laporan'] = 'transaksi/aktivitas/laporan';

$route['aktivitas/tl'] 	= 'transaksi/aktivitas/aktivitas_non_tl';
$route['aktivitas/now'] = 'transaksi/aktivitas/aktivitas_now';





