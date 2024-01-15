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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

$router->get('/', function (){
    return 'my lumen app we are inside';
});
$router->get('/users', 'UserController@index');
$router->get('/users/{id}', 'UserController@findById');
$router->put('/users/{id}', 'UserController@updateUser');
$router->post('/users', 'UserController@createUser');
$router->delete('/users/{id}', 'UserController@deleteUser');


//products routes
$router->get('/products', 'ProductController@getAllProducts');
$router->post('/products', 'ProductController@addProduct');
$router->get('/products/{id}', 'ProductController@getProductById');
$router->put('/products/{id}', 'ProductController@updateProduct');
$router->delete('/products/{id}', 'ProductController@deleteProduct');


//orders routes
$router->get('/orders', 'OrderController@getAllOrders');
$router->get('/orders/{id}', 'OrderController@getOrderById');
$router->post('/orders', 'OrderController@addOrder');
$router->put('/orders/{id}', 'OrderController@updateOrder');
$router->delete('/orders/{id}', 'OrderController@deleteOrder');

//admin routes
$router->get('/admin','AdminController@getAllUsersOrders');
$router->get('/admin/user/{id}','AdminController@totalPurchaseByUser');
