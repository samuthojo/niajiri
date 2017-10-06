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
    return redirect('home/dashboard');
});
Route::get('home/dashboard', 'HomeController@index')->name("dashboard");
Route::get('home/portal', 'HomeController@minor')->name("portal");


Route::resource('home/dashboard/sectors', 'SectorController');

Route::resource('home/dashboard/organizations', 'OrganizationController');

Route::resource('home/dashboard/projects', 'ProjectController');

Route::resource('home/dashboard/positions', 'PositionController');
