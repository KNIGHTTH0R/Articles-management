<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['posts'] = 'posts/index';
$route['default_controller'] = 'users/articles';
$route['(:any)']='users/articles/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
