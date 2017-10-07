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

Auth::routes();

Route::get('/', 'HomeController@index')->name("home");
Route::get('/dashboard', 'HomeController@index')->name("reports.dashboard");
Route::get('/minor', 'HomeController@minor')->name("minor");

//development only routes, should be commented on production
//Route::get('/artisan', 'SiteController@artisan')->name('artisan');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');
Route::get('/users/{user}/change', 'UserController@showChangePassword')->name('users.change_password');
Route::patch('/users/{user}/change', 'UserController@changePassword')->name('users.change_password');


Route::resource('organizations', 'OrganizationController');

Route::resource('projects', 'ProjectController');

Route::resource('organization/positions', 'PositionController');

Route::resource('sectors', 'SectorController');


Route::resource('organizations', 'OrganizationController');
