<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',             'FrontendController@index');
Route::get('/about',        'FrontendController@about');
Route::get('/gallery',      'FrontendController@gallery');
Route::get('/blog',         'FrontendController@blog');
Route::get('/blog/{post}',  'FrontendController@blog_single')->name('posts.show');
Route::get('tag/{slug}',    'FrontendController@getPostsByTag')->name('tag.posts.index');
Route::get('/donate',       'FrontendController@donate');
Route::get('/contact',      'FrontendController@contact');

Route::post('logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin'
], function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');

    Route::resource('images', 'ImageController');
    Route::post('images/upload', 'ImageController@upload');
    Route::post('images/revert', 'ImageController@delete_image');


    Route::resource('categories', 'CategoryController', [
        'except' => ['create', 'show', 'edit']
    ]);

    Route::resource('donations', 'DonationController');


    Route::resource('contact', 'ContactController', [
        'only' => ['index', 'store', 'destroy']
    ]);

    Route::get('password', 'ResetPasswordController@showPasswordResetFrom');
    Route::patch('password/change', 'ResetPasswordController@update')->name('password.change');
});

Route::resource('admin/contact', 'ContactController', [
    'only' => ['index', 'store', 'destroy']
]);

Route::resource('donations', 'DonationController');
