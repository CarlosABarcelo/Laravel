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

Route::get('/' , 'PagesController@getHome')->name('inicio');

Route::get('/about' , 'PagesController@getAbout');

Route::get('/contact' , 'PagesController@getContact');


Auth::routes();


Route::group([
    'prefix'    =>  'admin',
    'namespace' =>  'Admin',
    'middleware' => 'auth'],
    function () {
        Route::get('/', 'AdminController@index')->name('dashboard');

        Route::resource('posts', 'PostsController',['except' => 'show', 'as' => 'admin']);

        Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');


        Route::resource('usuarios','UsuariosController', ['as' => 'admin']);
        Route::resource('entradas','EntradasController', ['as' => 'admin']);
        Route::resource('contacts','ContactsController', ['as' => 'admin']);
        Route::resource('categorias','CategoriasController', ['except' => 'show' , 'as' => 'admin']);

    });

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('salir');


Route::get('entradas/{entrada}','EntradasController@show')->name('entrada.ver');

Route::get('categorias','CategoriasController@index')->name('categorias');
Route::get('entradas','EntradasController@index')->name('entradas');
//Route::get('entradas/ver','EntradasController@show')->name('entrada.ver');
Route::get('entradas.filtrocat','EntradasController@filtrocat')->name('entradas.filtrocat');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/messages', 'MessagesController@getMessages');

Route::post('/contact/submit', 'MessagesController@submit');
