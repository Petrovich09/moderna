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
    return view('index');
})->name('/');

Route::get('/about', 'AboutController@show')->name('about');

Route::get('/blog', 'BlogController@show')->name('blog')->middleware('auth');

Route::get('/blog-single/[id?]', 'Blog_SingleController@show')->name('blog-single')->middleware('auth');

Route::get('/contact', 'ContactController@show')->name('contact');

Route::get('/portfolio', 'PortfolioController@show')->name('portfolio');

Route::get('/services', 'ServicesController@show')->name('services');

Route::get('/team', 'TeamController@show')->name('team');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
