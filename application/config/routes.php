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

//User
$route['dashboard']         = 'dashboard/index';
$route['profile.php']       = 'user/profile';
$route['ubah_profile.php']  = 'user/ubah_profile';
$route['ubah_profile.do']   = 'user/proses_ubah_profile';
$route['ubah_password.do']  = 'user/proses_ubah_password';


$route['logout.php']        = 'login/logout';

//Master
$route['master/user']           = 'master/user';
$route['master/user_pelaksana'] = 'master/user/user_pelaksana';


$route['aktivitas/laporan'] = 'transaksi/aktivitas/laporan';





