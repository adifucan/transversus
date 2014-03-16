<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//system
$route['default_controller'] = "blog_controller";
$route['404_override'] = 'site_controller/page404';

//blog
//$route['blog/(:num)'] = 'blog_controller/index/$1';
//$route['blog/(:any)'] = 'blog_controller/article/$1';

//admin
$route['admin'] = 'admin_controller';
$route['admin/change/(:any)'] = 'admin_controller/change/$1';
$route['admin/change_article/(:any)'] = 'admin_controller/update_article/$1';
$route['admin/articles'] = 'admin_controller/articles';
$route['admin/article/(:any)'] = 'admin_controller/edit_article/$1';
$route['admin/category/(:any)'] = 'admin_controller/edit_category/$1';
$route['admin/change_category/(:any)'] = 'admin_controller/update_category/$1';
$route['admin/(:any)'] = 'admin_controller/$1';
$route['admin/(:any)/(:any)'] = 'admin_controller/$1/$2';

//parser
$route['parser-php'] = "parser_controller";

//category page
$route['category/(:any)'] = 'blog_controller/category/$1';

//blog page e.g.http://host/javascript/here-url
$route['(:any)/(:any)'] = 'blog_controller/article/$2';

//static page e.g. http://host/
$route['(:any)'] = 'pages_controller/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */