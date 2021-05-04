<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'BaseUser::index');
$routes->match(['get','post'],'register', 'BaseUser::register');
//$routes->match(['get','post'],'login', 'BaseUser::login');
$routes->match(['get','post'],'login', 'BaseUser::login');
$routes->match(['get','post'],'logout', 'BaseUser::logout');
$routes->match(['get','post'],'editProfile', 'Client::editProfile');
$routes->get('/Client', 'Client::index',['filter' => 'auth']);
$routes->get('/exercises', 'Moderator::exercises',['filter' => 'auth']);
$routes->get('/workouts/(:any)', 'BaseUser::workouts/$1');
$routes->get('/workouts', 'BaseUser::workouts',['filter' => 'auth']);
$routes->get('/saveWorkout/(:any)', 'Client::saveWorkout/$1',['filter' => 'auth']);
$routes->get('/savedWorkouts', 'Client::savedWorkouts',['filter' => 'auth']);
$routes->get('/removeFromSaved/(:any)', 'Client::removeFromSaved/$1',['filter' => 'auth']);
$routes->get('/editExercise/(:any)', 'Moderator::editExercise/$1',['filter' => 'auth']);
$routes->match(['get','post'],'updateExercise', 'Moderator::updateExercise');
$routes->get('/completeWorkout/(:any)','Client::completeWorkout/$1',['filter' => 'auth']);
$routes->match(['get','post'],'post/(:any)','Client::post/$1');
$routes->get('/profile','Client::profile');
$routes->get('/featured', 'BaseUser::featured');
$routes->match(['get','post'],'/addExercise', 'Moderator::addExercise');
$routes->get('/removeExercise/(:any)','Moderator::removeExercise/$1');
$routes->match(['get','post'],'/generateWorkout','Client::generateWorkout');
$routes->get('/saveCustomWorkout/(:any)/(:any)/(:any)','Client::saveCustomWorkout/$1/$2/$3');
$routes->match(['get','post'],'/addWorkout','Moderator::addWorkout');
$routes->get('/removeWorkout/(:any)','Moderator::removeWorkout/$1');
$routes->get('/editWorkout/(:any)', 'Moderator::editWorkout/$1');
$routes->match(['get','post'],'/editWorkout', 'Moderator::editWorkout');
$routes->get("/addToFeatured/(:any)", "Moderator::addToFeatured/$1");
$routes->get("/removeFromFeatured/(:any)", "Moderator::removeFromFeatured/$1");
$routes->match(['get','post'],"/search", "BaseUser::search");
$routes->get('/clients','Moderator::clients');
$routes->get("/livesearch", "Moderator::livesearch");
$routes->get('/viewClientPosts/(:any)','Moderator::viewClientPosts/$1');
$routes->get('/removePost/(:any)/(:any)','Moderator::removePost/$1/$2');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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
