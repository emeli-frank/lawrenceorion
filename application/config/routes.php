<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['(:any)'] = 'home/index';
$route['about-us'] = 'about';
$route['contact-us'] = 'contact';

// $route['products'] = 'product';

$route['~temp'] = 'manage/test';


$route['categories'] = 'category/showCategories';
$route['categories/add'] = 'category/addCategory';
$route['categories/(:num)/edit'] = 'category/editCategory/$1';
$route['categories/(:num)/delete'] = 'category/deleteCategory/$1';



// $route['categories'] = 'product/showCategoriesAndProducts';
$route['categories/all'] = 'product/showCategoriesAndProducts';
$route['categories/(:num)'] = 'product/showCategoriesAndProducts/$1';
$route['categories/(:num)/products/(:num)'] = 'product/showProductDetail/$1/$2';
$route['products/add'] = 'product/doAddProduct';
$route['products/(:num)/edit'] = 'product/editProduct/$1';
$route['products/(:num)/edit/do'] = 'product/doEditProduct/$1';
$route['products/(:num)/delete'] = 'product/deleteProduct/$1';
$route['categories/(:num)/products/add'] = 'product/addProduct/$1';

$route['admin'] = 'admin';
/* $route['admin/manage/categories'] = 'productmanager/categories';
$route['admin/manage/categories/(:num)'] = 'productmanager/categories/$1'; */

$route['login'] = 'account/login';
$route['logout'] = 'account/logout';
$route['register'] = 'account/register';

$route['~manage/seed'] = 'manage/seed';
