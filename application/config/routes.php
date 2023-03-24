<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'page404';
$route['translate_uri_dashes'] = TRUE;
$route[BACKEND_FOLDER]  = BACKEND_FOLDER.'/login';

# For blog url

$route['blog/search'] = 'blog/search';
$route['blog/search/page/:num'] = 'blog/search/';
$route['blog'] = 'blog/index/';
$route['blog/insertreview'] = 'blog/insertReview/';
$route['blog/(:any)/page/(:num)'] = 'blog/index/';
$route['blog/(:any)'] = 'blog/view/$1';
$route['blog/(:any)'] = 'blog/index/';
$route['blog/page/(:num)'] = 'blog/index/';

$route['tutor'] = 'tutor/index/';
$route['screen-test'] = 'tutor/quiz/';
$route['tutor_detail'] = 'tutor/tutor_detail/';
$route['tutor-logout'] = 'tutor/tutor_logout/';

$route['login'] = 'home/login';
$route['order'] = 'home/order';
$route['sign-up'] = 'home/sign_up';
$route['password_reset'] = 'home/password_reset';
$route['password-reset-confirm'] = 'home/password_reset_confirm';

$route['dashboard']  = 'dashboard/index';
$route['dashboard/new-user']  = 'dashboard/index';
$route['dashboard/new-user/order-successful']  = 'dashboard/index';
$route['dashboard/old-user']  = 'dashboard/index';
$route['dashboard/profile']  = 'dashboard/profile';
$route['dashboard/reset_password']  = 'dashboard/reset_password';
$route['(:any)'] = 'home/view/$1';
$route['thank-you/(:num)'] = 'tutor/thanks/';
# Backend routes


$route[BACKEND_FOLDER.'/pages/(:num)']  = BACKEND_FOLDER.'/pages/index/$1';

$route[BACKEND_FOLDER.'/blog-posts/(:num)']  = BACKEND_FOLDER.'/blog-posts/index/$1';

$route[BACKEND_FOLDER.'/users/(:num)']  = BACKEND_FOLDER.'/users/index/$1';

$route[BACKEND_FOLDER.'/users/(:num)']  = BACKEND_FOLDER.'/users/index/$1';

$route[BACKEND_FOLDER.'/tutors/(:num)']  = BACKEND_FOLDER.'/tutors/index/$1';

$route[BACKEND_FOLDER.'/tutors/delete-tutor']  = BACKEND_FOLDER.'/tutors/delete_tutor/';

$route[BACKEND_FOLDER.'/tutors/make-tutor-pass']  = BACKEND_FOLDER.'/tutors/make_tutor_pass/';
$route[BACKEND_FOLDER.'/tutors/show-interest/(:any)/(:any)']  = BACKEND_FOLDER.'/tutors/show_interest/$1/$2';

$route[BACKEND_FOLDER.'/orders/(:num)']  = BACKEND_FOLDER.'/orders/index/$1';

$route[BACKEND_FOLDER.'/orders/order-status-change/(:num)']  = BACKEND_FOLDER.'/orders/order-status-change/$1';
$route[BACKEND_FOLDER.'/orders/change-order-subject']  = BACKEND_FOLDER.'/orders/change_order_subject/';


$route[BACKEND_FOLDER.'/orders/get_tutors_s']  = BACKEND_FOLDER.'/orders/get_tutors_s/';
$route[BACKEND_FOLDER.'/orders/get_tutors_s/(:any)']  = BACKEND_FOLDER.'/orders/get_tutors_s/$1';
$route[BACKEND_FOLDER.'/orders/get_confirm_tutors_s/(:any)']  = BACKEND_FOLDER.'/orders/get_confirm_tutors_s/$1';
$route[BACKEND_FOLDER.'/orders/assign_to/(:any)/(:any)']  = BACKEND_FOLDER.'/orders/assign_to/$1/$2';

$route[BACKEND_FOLDER.'/order_detials/(:num)'] = BACKEND_FOLDER.'/orders/order_detials/$1';
$route[BACKEND_FOLDER.'/post_order_comments']  = BACKEND_FOLDER.'/orders/post_order_comments';
$route[BACKEND_FOLDER.'/get_comments'] = BACKEND_FOLDER.'orders/get_comments';
$route[BACKEND_FOLDER.'/get_comments/(:num)'] = BACKEND_FOLDER.'/orders/get_comments/$1';


$route[BACKEND_FOLDER.'/post_float_data'] = BACKEND_FOLDER.'/orders/post_float_data/';

$route[BACKEND_FOLDER.'/orders/get_order_counts']  = BACKEND_FOLDER.'/orders/get-order-counts';

