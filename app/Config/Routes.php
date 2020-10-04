<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Items');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Items::index');


$routes->add('items', 'Items::index',                ['namespace' => 'App\Controllers']);

$routes->add('newit/(:num)',  'Items::create/$1',    ['namespace' => 'App\Controllers']);
$routes->add('newitok',       'Items::create_ok',    ['namespace' => 'App\Controllers']);
$routes->add('itread/(:num)', 'Items::read/$1',      ['namespace' => 'App\Controllers']);
$routes->add('itup/(:num)',   'Items::update/$1',    ['namespace' => 'App\Controllers']);
$routes->add('upok',          'Items::update_ok',    ['namespace' => 'App\Controllers']);
$routes->add('itdel/(:num)',  'Items::delete/$1',    ['namespace' => 'App\Controllers']);
$routes->add('itreset',       'Items::newItems',     ['namespace' => 'App\Controllers']);
$routes->add('index2',        'Items::index2',       ['namespace' => 'App\Controllers']);
$routes->add('blog',          'Items::blog',         ['namespace' => 'App\Controllers']);
$routes->add('orden/(:num)',  'Items::reord/$1',     ['namespace' => 'App\Controllers']);
$routes->add('selcat',        'Items::selCat',       ['namespace' => 'App\Controllers']);
$routes->add('fcat/(:num)',   'Items::fcat/$1',      ['namespace' => 'App\Controllers']);

 
$routes->add('adcat',          'AdminCat::index',      ['namespace' => 'App\Controllers']);
$routes->add('creacat',        'AdminCat::creaCat',    ['namespace' => 'App\Controllers']);
$routes->add('creacatweb',     'AdminCat::creaCatWeb', ['namespace' => 'App\Controllers']);
$routes->add('creaok',         'AdminCat::creacat_ok', ['namespace' => 'App\Controllers']);
$routes->add('upcat/(:num)',   'AdminCat::upCat/$1',   ['namespace' => 'App\Controllers']);
$routes->add('upcatok',        'AdminCat::upCat_ok',   ['namespace' => 'App\Controllers']);
$routes->add('subcat/(:num)',  'AdminCat::subCat/$1',  ['namespace' => 'App\Controllers']);
$routes->add('nsubcat/(:num)', 'AdminCat::creaSubCat/$1',['namespace' => 'App\Controllers']);
$routes->add('nsubcat_ok',     'AdminCat::creaSubCat_ok',['namespace' => 'App\Controllers']);

$routes->add( 'login',         'Users::Entrar',           ['namespace' => 'App\Controllers']);
$routes->add( 'registro',      'Users::create',           ['namespace' => 'App\Controllers']);
$routes->add( 'users',         'UsersAdmin::index',       ['namespace' => 'App\Controllers']);
        

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
