<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method 
*/
$link = explode('/', (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
if ($link[5] == 'admin') {

  $this->set_directory("Admin");

  $request = $this->uri->segment(2);
  if (!empty($request) && strpos($request, '-')) {
    $route['admin/' . $request . ''] = str_replace('-', '_', $request);
    $route['admin/' . $request . '/(:any)'] = str_replace('-', '_', $request) . '/$1';
    $route['admin/' . $request . '/(:any)/(:any)'] = str_replace('-', '_', $request) . '/$1/$2';
  }
  $route['admin/logout'] = 'login/logout';
  $route['admin/forgot-password'] = 'login/forgot_password';
  $route['admin/reset-password/(:any)'] = 'login/reset_password/$1';
  $route['admin/editfile/(:any)'] = 'editfile/index/$1';
  $route['admin/(:any)'] = '$1';
  $route['admin/(:any)/(:any)'] = '$1/$2';
  $route['admin/(:any)/(:any)/(:any)'] = '$1/$2/$3';
  $route['admin/(:any)/(:any)/(:any)/(:any)'] = '$1/$2/$3/$4';
  $route['admin'] = 'dashboard';
  $route['default_controller'] = 'front';
  $route['404_override'] = '';
  $route['translate_uri_dashes'] = FALSE;
} else {
  $this->set_directory("Front");
  $route['default_controller'] = 'home';
  $route['404_override'] = 'error_404';
  $route['sign_in'] = 'home/sign_in';
  $route['sign_out'] = 'home/sign_out';

  $request = $this->uri->segment(1);
  if (!empty($request) && strpos($request, '-')) {
    $route[$request . ''] = str_replace('-', '_', $request);
    $route[$request . '/(:any)'] = str_replace('-', '_', $request) . '/$1';
    $route[$request . '/(:any)/(:any)'] = str_replace('-', '_', $request) . '/$1/$2';
  }


  $route['translate_uri_dashes'] = FALSE;

  // $route['default_controller'] = 'StripePaymentController';
  $route['404_override'] = '';
  $route['translate_uri_dashes'] = FALSE;

  $route['make-stripe-payment'] = "StripePaymentController";
  $route['handleStripePayment']['post'] = "StripePaymentController/handlePayment";

  $route['make-stripe-payment-owf'] = "StripePaymentController/owfFlower";
  $route['handleStripePayment-owf'] = "StripePaymentController/handlePaymentOwf";

  $route['submit_address-owf'] = "StripePaymentController/submit_address";
  $route['submit_personal-owf'] = "StripePaymentController/submit_personal";
}
