<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UserController@home');

Route::get('/galerie', function() {
    return redirect('/galerie'); });

Route::resource('/galerie', 'GalerieController');

Route::post('/postInscription',[
    'uses' => 'UserController@inscription',
    'as' => 'inscription.post'
]);

Route::get('/SignUp','UserController@inscriptionIndex');

Route::get('/SignIn','UserController@loginIndex');

Route::get('/bestSell','UserController@bestProduct');


Route::post('/postLogin',[
    'uses' => 'UserController@login',
    'as' => 'login.post'
]);


Route::get('/Admin','UserController@admin');

Route::get('Admin/ShowUser','UserController@showUserTable');

Route::get('Admin/ShowOrder','UserController@showOrderTable');

Route::post('Admin/ChangeRight','UserController@changeRight');


Route::get('/connexion', 'UserController@index');

Route::get('/logout','UserController@logout');

Route::get('/my-account', 'UserController@index');

Route::get('/shop/products', 'CartController@sortedProducts');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/home', 'HomeController@update');


//Shop part


Route::get('/shop', 'CartController@getBoutique');

Route::get('/shop/cart', [
    'uses' => 'CartController@getCart',
    'as' => 'product.basket'
]);

Route::get('/shop/product/{id}', 'CartController@product');


Route::get('/send', 'CartController@send');

Route::post('/add-to-cart',[
    'uses' => 'CartController@addItem',
    'as' => 'product.addToCart'
]);

Route::post('/remove',[
    'uses' => 'CartController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shop/delete', 'CartController@delete');

Route::get('/shop/add', 'CartController@add');

//EndShop

Route::get('/ideabox', function (){
    return view('ideabox');
});

Route::post('/ideabox', 'IdeaController@propose');

Route::get('/proposedevent', 'IdeaController@affichage');

Route::get('/incoming', 'EventController@incoming');

Route::get('/done', 'EventController@past');

Route::get('/events', function (){
    return view('Events');
});

Route::get('/events', 'likeController@download');

Route::get('/postEvent', 'postEventController@get');
Route::post('/postEvent', 'postEventController@post');

Route::get('/events/coming/{id}', 'EventController@index');

Route::get('/events/done', 'EventController@index');

Route::get('/done/{id}', 'PassedController@getEvent');

Route::post('/ideabox', 'IdeaController@propose');

Route::post('/events/signup', 'likeController@sign');

Route::post('/idea/vote', 'IdeaController@vote');

Route::post('/getUserEvent','likeController@download');