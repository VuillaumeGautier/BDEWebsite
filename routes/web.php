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

Route::get('/', function (){
   return view('home');
});

Route::get('/galerie', function(){ return redirect('/galerie'); });

Route::resource('/galerie', 'GalerieController');

Route::get('/inscription', 'UserController@index');

Route::get('/connexion', 'UserController@index');

Route::get('/my-account', 'UserController@index');

Route::get('/shop/products', 'CartController@sortedProducts');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/home', 'HomeController@update');


Route::get('/shop', 'CartController@getBoutique');

Route::get('/shop/basket', [
    'uses' => 'CartController@getCart',
    'as' => 'product.basket'
]);

Route::get('/shop/product/{id}', 'CartController@product');

Route::get('/boutique', [
    'uses' => 'CartController@getBoutique',
    'as' => 'product.index'
]);

Route::post('/add-to-cart',[
    'uses' => 'CartController@addItem',
    'as' => 'product.addToCart'
]);

Route::get('/remove',[
    'uses' => 'CartController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/events', 'EventController@index');

Route::post('/proposedevent', 'IdeaController@propose');

Route::get('/proposedevent', 'IdeaController@affichage');

Route::get('/events/coming', 'EventController@index');

Route::get('/events/coming/{id}', 'EventController@index');

Route::get('/events/done', 'EventController@index');

Route::get('/events/done/{id}', 'EventController@index');

Route::group(['middleware' => ['auth']], function()
{
    // show new post form
    Route::get('new-post','EventController@create');
    // save new post
    Route::post('new-post','EventController@store');
    // edit post form
    Route::get('edit/{slug}','EventController@edit');
    Route::get('inscription/{slug}','EventController@inscription');
    Route::post('inscrire','InscriptionController@index');
    // update post
    Route::post('update','EventController@update');
    // delete post
    Route::get('delete/{id}','EventController@destroy');
    // display user's all posts
    Route::get('my-all-posts','EventController@user_posts_all');
    // add comment
    Route::post('comment/add','CommentController@store');
    // delete comment
    Route::post('comment/delete/{id}','EventController@distroy');
});
