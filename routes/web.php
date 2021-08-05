<?php


/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


/**
 * Use this api end point to show a user using it's slug 'http://localhost:8000/promotions/{client-slug}'
 * please see users table and see slug_full_name column as to use the slug
 * 
 * After getting the response get the 'id' value and use it as 'user_id;
 * in 'entrant/winning-moment' and 'entrant/chance' end points
 */
$router->get('promotions/{clientSlug}', 'UserController@show');

// use this json format to save a an entrant data (postman)
// marketing_strategy: Strategy test
// estimated_cost: 120000
// estimated_roi:500000
// title:Title of promotion
// user_id:1
// email:valvinzm@gmail.com
// participant_name:Val Vincent Montesclaros
// contact_no:0945351905
// address:Cebu City

// use this json format to save an entrant record (postman)
// promotion_id:1
$router->post('entrant/winning-moment', 'EntrantController@storeWinningMoment');
$router->post('entrant/chance', 'EntrantController@storechance');

