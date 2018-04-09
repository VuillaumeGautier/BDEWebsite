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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galerie', function(){ return redirect('/galerie'); });

Route::resource('/galerie', 'GalerieController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/createProduct', 'CartController@add');

Route::post('/insertProduct', 'CartController@create');

Route::get('/boutique', [
    'uses' => 'CartController@getBoutique',
    'as' => 'product.index'
]);

Route::get('/add-to-cart/{id}',[
    'uses' => 'CartController@addItem',
    'as' => 'product.addToCart'
]);
Route::get('/remove/{id}',[
    'uses' => 'CartController@getRemoveItem',
    'as' => 'product.remove'
]);
Route::get('/shopping-cart',[
    'uses' => 'CartController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/reduce/{id}',[
    'uses' => 'CartController@getReduceOne',
    'as' => 'product.reduceOne'
]);
Route::get('/add/{id}',[
    'uses' => 'CartController@getAddOne',
    'as' => 'product.addOne'
]);

Route::post('/home', 'HomeController@update');

Route::get('/activite', 'ActiviteController@index');

Route::group(['middleware' => ['auth']], function()
{
    // show new post form
    Route::get('new-post','ActiviteController@create');
    // save new post
    Route::post('new-post','ActiviteController@store');
    // edit post form
    Route::get('edit/{slug}','ActiviteController@edit');
    Route::get('inscription/{slug}','ActiviteController@inscription');
    Route::post('inscrire','InscriptionController@index');
    // update post
    Route::post('update','ActiviteController@update');
    // delete post
    Route::get('delete/{id}','ActiviteController@destroy');
    // display user's all posts
    Route::get('my-all-posts','ActiviteController@user_posts_all');
    // display user's drafts
    Route::get('my-drafts','ActiviteController@user_posts_draft');
    // add comment
    Route::post('comment/add','CommentController@store');
    // delete comment
    Route::post('comment/delete/{id}','ActiviteController@distroy');
});

Route::get('user/{id}','UserController@profile')->where('id', '[0-9]+');
