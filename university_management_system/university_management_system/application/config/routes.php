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
$route['default_controller'] = 'User_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//admin
$route['admin'] = 'admin_controller/index';
$route['admin_login_check'] = 'admin_controller/admin_login_check';
$route['logout'] = 'admin_controller/logout';
$route['dashboard'] = 'admin_controller/dashboard';

//depatment
$route['add_department'] = 'admin_controller/add_department';
$route['save_department'] = 'admin_controller/save_department';
$route['view_department'] = 'admin_controller/view_department';
$route['delete_department/(:any)'] = 'admin_controller/delete_department';

//course
$route['add_course'] = 'admin_controller/add_course';
$route['save_course'] = 'admin_controller/save_course';
$route['view_course'] = 'admin_controller/view_course';
$route['delete_course/(:any)'] = 'admin_controller/delete_course';

//teacher
$route['add_teacher'] = 'admin_controller/add_teacher';
$route['save_teacher'] = 'admin_controller/save_teacher';
$route['view_teacher'] = 'admin_controller/view_teacher';
$route['delete_teacher/(:any)'] = 'admin_controller/delete_teacher';

//course assign to teacher
$route['course_assign_to_teacher'] = 'admin_controller/course_assign_to_teacher';
$route['select_teacher_by_id_in_ajax'] = 'admin_controller/select_teacher_by_id_in_ajax';
$route['select_course_by_id_in_ajax'] = 'admin_controller/select_course_by_id_in_ajax';
$route['select_department_by_id_in_ajax'] = 'admin_controller/select_department_by_id_in_ajax';
$route['save_course_assign_to_teacher'] = 'admin_controller/save_course_assign_to_teacher';


//view course static
$route['view_course_static'] = 'admin_controller/view_course_static';

//register student
$route['register_student'] = 'admin_controller/register_student';
$route['add_classroom'] = 'admin_controller/add_classroom';
$route['save_classroom'] = 'admin_controller/save_classroom';
$route['allocate_classroom'] = 'admin_controller/allocate_classroom';
