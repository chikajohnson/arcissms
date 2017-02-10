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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/dashboard/index';
$route['students'] = 'students/results';
$route['login'] = 'admin/dashboard/login';
$route['home'] = 'welcome/home';
$route['examiner'] = 'examiner/dashboard/login';
$route['examiner/home'] = 'examiner/dashboard/index';
$route['examiner/activities'] = 'examiner/dashboard/index';

$route['admin/courses/edit/(:any)'] = 'admin/courses/edit/$1';
$route['admin/courses/delete/(:any)'] = 'admin/courses/delete/$1';
$route['admin/courses/detail/(:any)'] = 'admin/courses/detail/$1';


$route['admin/semesters/edit/(:any)'] = 'admin/semesters/edit/$1';
$route['admin/semesters/delete/(:any)'] = 'admin/semesters/delete/$1';
$route['admin/semesters/detail/(:any)'] = 'admin/semesters/detail/$1';


$route['admin/educations/edit/(:any)'] = 'admin/educations/edit/$1';
$route['admin/educations/delete/(:any)'] = 'admin/educations/delete/$1';
$route['admin/educations/detail/(:any)'] = 'admin/educations/detail/$1';


$route['admin/programs/edit/(:any)'] = 'admin/programs/edit/$1';
$route['admin/programs/delete/(:any)'] = 'admin/programs/delete/$1';
$route['admin/programs/detail/(:any)'] = 'admin/programs/detail/$1';

$route['admin/message_types/edit/(:any)'] = 'admin/message_types/edit/$1';
$route['admin/message_types/delete/(:any)'] = 'admin/message_types/delete/$1';
$route['admin/message_types/detail/(:any)'] = 'admin/message_types/detail/$1';

$route['admin/messages/edit/(:any)'] = 'admin/messages/edit/$1';
$route['admin/messages/delete/(:any)'] = 'admin/messages/delete/$1';
$route['admin/messages/detail/(:any)'] = 'admin/messages/detail/$1';

$route['admin/students/edit/(:any)'] = 'admin/students/edit/$1';
$route['admin/students/delete/(:any)'] = 'admin/students/delete/$1';
$route['admin/students/detail/(:any)'] = 'admin/students/detail/$1';

$route['admin/courses/search/(:any)'] = 'admin/courses/index/$1';
$route['admin/educations/search/(:any)'] = 'admin/educations/index/$1';
$route['admin/academic_sessions/search/(:any)'] = 'admin/academic_sessions/index/$1';
$route['admin/students/search/(:any)'] = 'admin/students/index/$1';
$route['admin/results/search/(:any)'] = 'admin/results/index/$1';
$route['admin/courses/search/(:any)'] = 'admin/courses/index/$1';


$route['admin/courses/paginate/(:any)'] = 'admin/courses/index';



